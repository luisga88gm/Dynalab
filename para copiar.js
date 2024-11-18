<?php
    include('partials/app-scripts.php');

    $show_table = 'suppliers';
    $suppliers = include('database/show.php');

    $suppliers_arr = [];

    foreach($suppliers as $supplier){
        $suppliers_arr[$supplier['id']] = $supplier['supplier_name'];
    }

    $suppliers_arr = json_encode($suppliers_arr);
?>
<script>
    var suppliersList = <?= $suppliers_arr ?>;

    function script(){
        
        var vm = this;

        this.registerEvents = function(){
            document.addEventListener('click', function(e){
                targetElement = e.target; // Target element
                classList = targetElement.classList;

                if(classList.contains('deleteProduct')){
                    e.preventDefault(); // this prevents the default mechanism.

                    pId = targetElement.dataset.pid;
                    pName = targetElement.dataset.name;

                    BootstrapDialog.confirm({
                        type: BootstrapDialog.TYPE_DANGER,
                        title:'Delete Product',
                        message: 'Está seguro de eliminar <strong>'+ pName +'</strong>?',
                        callback: function(isDelete){
                            if(isDelete){
                                $.ajax({
                                    method: 'POST',
                                    data: {
                                        id: pId,
                                        table:'products'
                                    },
                                    url: 'database/delete.php',
                                    dataType: 'json',
                                    success: function(data){
                                        message = data.success ?
                                        pName + ' successfully deleted!' : 'Error processing your request!';

                                        BootstrapDialog.alert({
                                            type: data.success ? BootstrapDialog.TYPE_SUCCESS : BootstrapDialog.TYPE_DANGER,
                                            message: message,
                                            callback: function(){
                                                if(data.success) location.reload();                                                    
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    });
                }

                if(classList.contains('updateProduct')){
                    e.preventDefault(); // this prevents the default mechanism.

                    pId = targetElement.dataset.pid;
                    vm.showEditDialog(pId);
                }

            });

            document.addEventListener('submit', function(e){
                e.preventDefault();
                targetElement = e.target;

                if(targetElement.id === 'editProductForm'){
                    vm.saveUpdatedData(targetElement);
                }
            })
        },

        this.saveUpdatedData = function(form){
            $.ajax({
                method: 'POST',
                data: new FormData(form),
                url: 'database/update-product.php',
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    BootstrapDialog.alert({
                        type: data.success ? BootstrapDialog.TYPE_SUCCESS : BootstrapDialog.TYPE_DANGER,
                        message: data.message,
                        callback: function(){
                            if(data.success) location.reload();
                        }
                    });
                }
            });
        },

        this.showEditDialog = function(id){
            $.get('database/get-product.php', {id: id}, function(productDetails){
                let curSuppliers = productDetails['suppliers'];
                let supplierOption = '';
                
                for (const [supId, supName] of Object.entries(suppliersList)) {
                    selected = curSuppliers.indexOf(supId) > -1 ? 'selected' : '';
                    supplierOption += "<option "+ selected +" value='"+ supId +"'>"+ supName +"</option>";
                }

                BootstrapDialog.confirm({
                    title: 'Update <strong>' + productDetails.product_name + '</strong>',
                    message: '<form action="database/add.php" method="POST" enctype="multipart/form-data" id-"editProductForm">\
                        <div class="appFormInputContainer">\
                            <label for="product_name">Product Name</label>\
                            <input type="text" class="appFormInput" id="product_name" value="'+ productDetails.product_name +'" placeholder="enter product name..." name="product_name" />\
                        </div>\
                        <div class="appFormInputContainer">\
                            <label for="description">Suppliers</label>\
                            <select name="suppliers[]" id="suppliersSelect" multiple="">\
                                <option value="">Select Supplier</option>\
                                ' +     supplierOption + '\
                            </select>\
                        </div>\
                        <div class="appFormInputContainer">\
                            <label for="description">Description</label>\
                            <textarea class="appFormInput productTextAreaInput" id="description" placeholder="enter product description..." name="description"> '+ productDetails.description +'</textarea>\
                        </div>\
                        <div class="appFormInputContainer">\
                            <label for="product_name">Product Image</label>\
                            <input type="file" name="img" />\
                        </div>\
                        <input type="hidden" name="pid" value="'+ productDetails.id +'" />\
                        <input type="submit" value="submit" id="editProductSubmitBtn" class="hidden"/>\
                    </form>\
                    ',
                    callback: function(isUpdate){
                        if(isUpdate){ // If user click 'OK' button
                            document.getElementById('editProductSubmitBtn').click();
                        }
                    }
                });
            }, 'json');
        }

        this.initialize = function(){
            this.registerEvents();
        }
    }
    var script = new script;
    script.initialize();
</script>