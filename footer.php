

<script src="assets/js/handlebars.min.js"></script>
<script src="assets/js/amazeui.widgets.helper.js"></script>
<script src="assets/js/amazeui.widgets.helper.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script type="text/javascript">

//MANAGER PART
    
    //manager profile part
    $('#manager_profile_model_open').on('click', function(e) {      //manager_profile_open
        
         $.ajax({
             cache: true,
             type: "get",
             url:"manager.php?action=manager_profile_open&manager_email=<?php if(isset($_SESSION['manager_email']))echo $_SESSION['manager_email']?>",
             dataType:"json",
             async: true,
             error: function(request) {
                 console.log(request);
             },
             success: function(data) {

                 $("#manager_email").val(data.manager_email);
                 $("#manager_name").val(data.manager_name);
                 $("#manager_password").val(data.manager_password);

                 $("#manager_profile_modal").modal('open');

             }
         });
        
         return false;
    });

    $('#submit_update_profile_cancel').on('click', function() {         //manager_profile_close
        $('#manager_profile_modal').modal("close");
    });




    $("#manager_profile_update").submit(function(event) {           //manager_profile_update
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message0").html(data);
                window.location.href="manager_login.php";
            }
        });
        return false;
    });

    //customer management part

    $("#search_customer").on('click',function(){					//manager search customers
    //$("#c_content").text($(this).attr("checkstudentinfo"));
        if($("#search_customer_index").val()==""){

                window.location.href="admin-customer_management.php";
                
        }else{
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-products.php?action=search_customer&search_customer_index="+$("#search_customer_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    // alert("success");
                    window.location.href="admin-customer_management.php?action=search_customer&search_customer_index="+$("#search_customer_index").val();
                }
            });
        }
        
        return false;
    });

    $('#add_customer').on('click',function(){   //click add customer,modal open
        $('#add_customer_modal').modal('open');
    });

    $("#customer_modal_add").submit(function(event) {   //submit adding customers
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if(data=="Add successfully!"){
                    $("#message4").html(data);
                    location.reload();
                }else{
                    $("#message4").html(data);
                }
                
            }
        });
        
        return false;
    });

    $("#cancel_submit_add_customer").on('click',function(){
        $('#add_customer_modal').modal('close');
        location.reload();
    });

    $(".edit_customer").on('click',function(){              //edit customer modal open,return the customer' information
        $("#customer_update .index_customer_username").val($(this).attr("customer_username_click"));
        //alert($(index_customer_username).val());
        $("input[name=customer_username]").val($(this).parents("td").prev().prev().prev().prev().html());
        console.dir($("input[name=customer_username]").val())

        $("input[name=customer_name]").val($(this).parents("td").prev().prev().prev().html());
        console.dir($("input[name=customer_name]").val())

        $("input[name=customer_address]").val($(this).parents("td").prev().prev().html());
        console.dir($("input[name=customer_address]").val())

        $("input[name=customer_password]").val($(this).parents("td").prev().html());
        console.dir($("input[name=customer_password]").val())

        $("#edit_customer_modal").modal('open');
    });



    $("#customer_update").submit(function(event){        //update customer
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message5").html(data);
            }

        });
        return false;
    });

    
    $("#cancel_submit_edit_customer").on('click',function(){
        $('#edit_customer_modal').modal('close');
        location.reload();
    });

    $(".delete_customer").on('click',function(){          //delete customer modal open
        $("#delete_customer_modal").modal('open');
        $("#delete_customer_username_index").text($(this).attr("del_customer_username"));
        //alert($(delete_customer_username_index).text());
    });


    

    $("#delete_this_customer").on('click',function(){      //confirm to delete this customer
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=customer_delete&delete_customer_username_index="+$("#delete_customer_username_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message6").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#cancel_delete_this_customer").on('click',function(){  //candel delete customer
        $("#delete_customer_modal").modal('close');
        location.reload();
    });



    //product management part


    $("#search_product").on('click',function(){					//manager search products
    //$("#c_content").text($(this).attr("checkstudentinfo"));
        if($("#search_product_index").val()==""){

                window.location.href="admin-products.php";
                
        }else{
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-products.php?action=product_search&search_product_index="+$("#search_product_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    // alert("success");
                    window.location.href="admin-products.php?action=product_search&search_product_index="+$("#search_product_index").val();
                }
            });
        }
        
        return false;
    });

    $('#add_product').on('click',function(){   //manager add products
        $('#add_product_modal').modal('open');
    });

    $("#product_modal_add").submit(function(event) {   //manager submit adding products
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if(data=="Add successfully!"){
                    $("#message1").html(data);
                    location.reload();
                }else{
                    $("#message1").html(data);
                }
                
            }
        });
        
        return false;

    });

    $("#cancel_submit_add_product").on('click',function(){  //cancel add product
        $("#add_product_modal").modal('close');
        location.reload();
    });

    $(".edit_product").on('click',function(){              //edit products modal open,return the products' information
        // console.log()
        $("#product_update .index_product_id").val($(this).attr("product_id_click"));
        //alert($(index_product_id).val());
        $("input[name=product_id]").val($(this).parents("td").prev().prev().prev().prev().html());
        console.dir($("input[name=product_id]").val())

        $("input[name=product_kind]").val($(this).parents("td").prev().prev().prev().html());
        console.dir($("input[name=product_kind]").val())

        $("input[name=product_name]").val($(this).parents("td").prev().prev().html());
        console.dir($("input[name=product_name]").val())

        $("input[name=product_unitprice]").val($(this).parents("td").prev().html());
        console.dir($("input[name=product_unitprice]").val())
        
        //alert($(product_id).val());
        $("#edit_product_modal").modal('open');

    });

    $("#product_update").submit(function(event){        //update product
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message2").html(data);
            }

        });
        location.reload();
        return false;
    });

    $("#cancel_submit_edit_product").on('click',function(){  //cancel edit product
        $("#edit_product_modal").modal('close');
        location.reload();
    });

    $(".delete_product").on('click',function(){          //delete product modal open
        $("#delete_product_modal").modal('open');
        $("#delete_product_id_index").text($(this).attr("del_product_id"));

        //alert($(delete_product_id_index).text());
    });


    

    $("#delete_this_product").on('click',function(){      //confirm to delete this product
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=product_delete&delete_product_id_index="+$("#delete_product_id_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message3").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#cancel_delete_this_product").on('click',function(){  //cancel delete product
        $("#delete_product_modal").modal('close');
    });

    //manager manage transation part

    $("#manager_search_transaction").on('click',function(){                    //manager search transactions
    //$("#c_content").text($(this).attr("checkstudentinfo"));
    //alert("kk");
        if($("#search_transaction_index").val()==""){

            window.location.href="manager-transaction.php";
                
        }else{
            //alert($("#search_transaction_index").val());
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-transaction.php?action=manager_transaction_search&search_transaction_index="+$("#search_transaction_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    //alert("success");
                    window.location.href="admin-transaction.php?action=manager_transaction_search&search_transaction_index="+$("#search_transaction_index").val();

                }
            });
        }
        
        return false;
    });

    $(".manager_deliver_order").on('click',function(){        //manager deliver order
        $("#manager_deliver_order_id").text($(this).attr("manager_deliver_order_id_click"));
        //alert($("#customer_pay_order_id").text());
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=manager_deliver_order&manager_deliver_order_id="+$("#manager_deliver_order_id").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){
                alert(data);
                //alert("Delivered successfully!");
                //alert($("#customer_pay_order_id").text());
            }
        });
        location.reload();
        return false;
    });

    $(".manager_delete_order").on('click',function(){          //manager delete order modal open
        $("#manager_delete_order_modal").modal('open');
        $("#manager_delete_order_id_index").text($(this).attr("manager_del_order_id_index"));

        //alert($(delete_product_id_index).text());
    });

    $("#manager_confirm_delete_this_order").on('click',function(){      //manager confirm to delete this order
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=manager_order_delete&manager_delete_order_id_index="+$("#manager_delete_order_id_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message11").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#manager_cancel_delete_this_order").on('click',function(){  //manager cancel delete order
        $("#manager_delete_order_modal").modal('close');
    });



    //salesman management part


    $("#search_salesman").on('click',function(){                 //manager search salesman
    
        if($("#search_salesman_index").val()==""){

                window.location.href="admin-salesman.php";
                
        }else{
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-salesman.php?action=salesman_search&search_salesman_index="+$("#search_salesman_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    // alert("success");
                    window.location.href="admin-salesman.php?action=salesman_search&search_salesman_index="+$("#search_salesman_index").val();
                }
            });
        }
        
        return false;
    });

    $('#add_salesman').on('click',function(){   //manager add salesman
        $('#add_salesman_modal').modal('open');
    });

    $("#salesman_modal_add").submit(function(event) {   //manager submit adding salesman
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if(data=="Add successfully!"){
                    $("#message11").html(data);
                    location.reload();
                }else{
                    $("#message11").html(data);
                }
                
            }
        });
        
        return false;

    });

    $("#cancel_submit_add_salesman").on('click',function(){  //cancel add salesman
        $("#add_salesman_modal").modal('close');
        location.reload();
    });

    $(".edit_salesman").on('click',function(){        //edit salesman modal open,return the salesman's information
        // console.log()
        $("#salesman_update .index_product_id").val($(this).attr("salesman_id_click"));
        //alert($(index_salesman_id).val());
        $("input[name=salesman_id]").val($(this).parents("td").prev().prev().prev().prev().prev().html());
        console.dir($("input[name=salesman_id]").val())

        $("input[name=salesman_firstname]").val($(this).parents("td").prev().prev().prev().prev().html());
        console.dir($("input[name=salesman_firstname]").val())

        $("input[name=salesman_lastname]").val($(this).parents("td").prev().prev().prev().html());
        console.dir($("input[name=salesman_lastname]").val())

        $("input[name=salesman_Cityid]").val($(this).parents("td").prev().prev().html());
        console.dir($("input[name=salesman_Cityid]").val())

        $("input[name=salesman_address]").val($(this).parents("td").prev().html());
        console.dir($("input[name=salesman_address]").val())
        
        //alert($(product_id).val());
        $("#edit_salesman_modal").modal('open');

    });

    $("#salesman_update").submit(function(event){        //update salesman
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message12").html(data);
            }

        });
        location.reload();
        return false;
    });

    $("#cancel_submit_edit_salesman").on('click',function(){  //cancel edit salesman
        $("#edit_salesman_modal").modal('close');
        location.reload();
    });

    $(".delete_salesman").on('click',function(){          //delete salesman modal open
        $("#delete_salesman_modal").modal('open');
        $("#delete_salesman_id_index").text($(this).attr("del_salesman_id"));

        //alert($(delete_salesman_id_index).text());
    });


    

    $("#delete_this_salesman").on('click',function(){      //confirm to delete this salesman
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=salesman_delete&delete_salesman_id_index="+$("#delete_salesman_id_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message13").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#cancel_delete_this_salesman").on('click',function(){  //cancel delete salesman
        $("#delete_salesman_modal").modal('close');
    });



    //store management part


    $("#search_store").on('click',function(){                 //manager search store
    
        if($("#search_store_index").val()==""){

                window.location.href="admin-store.php";
                
        }else{
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-store.php?action=store_search&search_store_index="+$("#search_store_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    // alert("success");
                    window.location.href="admin-store.php?action=store_search&search_store_index="+$("#search_store_index").val();
                }
            });
        }
        
        return false;
    });

    $('#add_store').on('click',function(){   //manager add store
        $('#add_store_modal').modal('open');
    });

    $("#store_modal_add").submit(function(event) {   //manager submit adding store
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if(data=="Add successfully!"){
                    $("#message14").html(data);
                    location.reload();
                }else{
                    $("#message14").html(data);
                }
                
            }
        });
        
        return false;

    });

    $("#cancel_submit_add_store").on('click',function(){  //cancel add store
        $("#add_store_modal").modal('close');
        location.reload();
    });

    $(".edit_store").on('click',function(){        //edit store modal open,return the store's information
        // console.log()
        $("#store_update .index_store_id").val($(this).attr("store_id_click"));
        //alert($(index_store_id).val());

        $("input[name=store_id]").val($(this).parents("td").prev().prev().prev().prev().prev().prev().html());
        console.dir($("input[name=store_id]").val())

        $("input[name=store_boss]").val($(this).parents("td").prev().prev().prev().prev().prev().html());
        console.dir($("input[name=store_boss]").val())

        $("input[name=store_address]").val($(this).parents("td").prev().prev().prev().prev().html());
        console.dir($("input[name=store_address]").val())

        $("input[name=store_city]").val($(this).parents("td").prev().prev().prev().html());
        console.dir($("input[name=store_city]").val())

        $("input[name=store_state]").val($(this).parents("td").prev().prev().html());
        console.dir($("input[name=store_state]").val())

        $("input[name=store_zipcode]").val($(this).parents("td").prev().html());
        console.dir($("input[name=store_zipcode]").val())
        
        //alert($(store_id).val());
        $("#edit_store_modal").modal('open');

    });

    $("#store_update").submit(function(event){        //update store
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message15").html(data);
            }

        });
        location.reload();
        return false;
    });

    $("#cancel_submit_edit_store").on('click',function(){  //cancel edit store
        $("#edit_store_modal").modal('close');
        location.reload();
    });

    $(".delete_store").on('click',function(){          //delete store modal open
        $("#delete_store_modal").modal('open');
        $("#delete_store_id_index").text($(this).attr("del_store_id"));

        //alert($(delete_store_id_index).text());
    });


    

    $("#delete_this_store").on('click',function(){      //confirm to delete this store
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=store_delete&delete_store_id_index="+$("#delete_store_id_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message16").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#cancel_delete_this_store").on('click',function(){  //cancel delete store
        $("#delete_store_modal").modal('close');
    });



    //supplier management part


    $("#search_supplier").on('click',function(){					//manager search supplier
 
        if($("#search_supplier_index").val()==""){

                window.location.href="admin-supplier.php";
                
        }else{
            $.ajax({
                cache: true,
                type: "get",
                url:"admin-supplier.php?action=supplier_search&search_supplier_index="+$("#search_supplier_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    // alert("success");
                    window.location.href="admin-supplier.php?action=supplier_search&search_supplier_index="+$("#search_supplier_index").val();
                }
            });
        }
        
        return false;
    });

    $('#add_supplier').on('click',function(){   //manager add supplier
        $('#add_supplier_modal').modal('open');
    });

    $("#supplier_modal_add").submit(function(event) {   //manager submit adding supplier
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                if(data=="Add successfully!"){
                    $("#message17").html(data);
                    location.reload();
                }else{
                    $("#message17").html(data);
                }
                
            }
        });
        
        return false;

    });

    $("#cancel_submit_add_supplier").on('click',function(){  //cancel add supplier
        $("#add_supplier_modal").modal('close');
        location.reload();
    });

    $(".edit_supplier").on('click',function(){              //edit supplier modal open,return the products' information
        // console.log()
        $("#supplier_update .index_supplier_id").val($(this).attr("supplier_id_click"));
        //alert($(index_product_id).val());
        $("input[name=supplier_id]").val($(this).parents("td").prev().prev().prev().prev().html());
        console.dir($("input[name=supplier_id]").val())

        $("input[name=supplier_name]").val($(this).parents("td").prev().prev().prev().html());
        console.dir($("input[name=supplier_name]").val())

        $("input[name=supplier_phone]").val($(this).parents("td").prev().prev().html());
        console.dir($("input[name=supplier_phone]").val())

        $("input[name=supplier_email]").val($(this).parents("td").prev().html());
        console.dir($("input[name=supplier_email]").val())
        
        //alert($(supplier_id).val());
        $("#edit_supplier_modal").modal('open');

    });

    $("#supplier_update").submit(function(event){        //update supplier
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message18").html(data);
            }

        });
        location.reload();
        return false;
    });

    $("#cancel_submit_edit_supplier").on('click',function(){  //cancel edit supplier
        $("#edit_supplier_modal").modal('close');
        location.reload();
    });

    $(".delete_supplier").on('click',function(){          //delete supplier modal open
        $("#delete_supplier_modal").modal('open');
        $("#delete_supplier_id_index").text($(this).attr("del_supplier_id"));

        //alert($(delete_supplier_id_index).text());
    });


    

    $("#delete_this_supplier").on('click',function(){      //confirm to delete this supplier
        $.ajax({
            cache:true,
            type:"get",
            url:"manager.php?action=supplier_delete&delete_supplier_id_index="+$("#delete_supplier_id_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message19").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#cancel_delete_this_supplier").on('click',function(){  //cancel delete supplier
        $("#delete_supplier_modal").modal('close');
    });


// CUSTOMER PART

    //Login register part
    $("#turn_to_register").on('click',function(){            //login page turn to register page
        window.location.href='customer_register.php';
    });

    //customer manage profile part
    $('#customer_profile_model_open').on('click', function(e) {      //customer_profile_open
        
         $.ajax({
             cache: true,
             type: "get",
             url:"customer.php?action=customer_profile_open&customer_username=<?php if(isset($_SESSION['customer_username']))echo $_SESSION['customer_username']?>",
             dataType:"json",
             async: true,
             error: function(request) {
                 console.log(request);
             },
             success: function(data) {

             $("#customer_username").val(data.customer_username);
             $("#customer_name").val(data.customer_name);
             $("#customer_password").val(data.customer_password);
             $("#customer_address").val(data.customer_address);

             $("#customer_profile_modal").modal('open');

             }
         });
        
         return false;
    });

    $('#submit_update_profile_cancel').on('click', function() {         //customer_profile_close
        $('#customer_profile_modal').modal("close");
    });




    $("#customer_profile_update").submit(function(event) {           //customer_profile_update
        //alert("kk")
        $.ajax({
            cache: true,
            type: $(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async: true,
            error: function(request) {
                alert(request);
            },
            success: function(data) {
                $("#message00").html(data);
                window.location.href="customer_login.php";
                
                
            }
        });
        return false;
    });

    //search product part
    $("#customer_search_product").on('click',function(){					//customer search products
    //$("#c_content").text($(this).attr("checkstudentinfo"));
        if($("#search_product_index").val()==""){

                window.location.href="customer-products.php";
                
        }else{
            $.ajax({
                cache: true,
                type: "get",
                url:"customer-products.php?action=product_search&search_product_index="+$("#search_product_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    // alert("success");
                    window.location.href="customer-products.php?action=product_search&search_product_index="+$("#search_product_index").val();
                }
            });
        }
        
        return false;
    });

    $(".add_to_transaction").on('click',function(){                             //add to transaction model open
        $("#product_to_transaction .index_product_id").val($(this).attr("product_id_click"));
        //alert($(index_product_id).val());
        $("input[name=product_id]").val($(this).parents("td").prev().prev().prev().prev().html());
        console.dir($("input[name=product_id]").val())

        $("input[name=product_name]").val($(this).parents("td").prev().prev().html());
        console.dir($("input[name=product_name]").val())

        $("input[name=product_unitprice]").val($(this).parents("td").prev().html());
        console.dir($("input[name=product_unitprice]").val())

        $.ajax({
             cache: true,
             type: "get",
             url:"customer.php?action=customer_add_to_transaction_model_open&customer_username=<?php if(isset($_SESSION['customer_username']))echo $_SESSION['customer_username']?>",
             dataType:"json",
             async: true,
             error: function(request) {
                 console.log(request);
             },
             success: function(data) {
             //alert(data.customer_address);

             $("#modal_customer_phone").val(data.customer_username);
             $("#modal_customer_name").val(data.customer_name);
             $("#modal_customer_address").val(data.customer_address);

             $("#add_product_to_transaction_modal").modal('open');
             },

         });
        
         return false;

        
    });

    $("#product_to_transaction").submit(function(event){        //customer submit add product to transaction
        $.ajax({
            cache:true,
            type:$(this).attr("method"),
            url:$(this).attr("action"),
            data:$(this).serialize(),
            async:true,
            error:function(request){
                alert(request);
            },
            success:function(data){
                $("#message7").html(data);
            }

        });
        
        return false;
    });

    $("#customer_search_transaction").on('click',function(){     //customer search transaction
    //$("#c_content").text($(this).attr("checkstudentinfo"));
    //alert("kk");
        if($("#search_transaction_index").val()==""){

                window.location.href="customer-transaction.php";
                
        }else{
            //alert($("#search_transaction_index").val());
            $.ajax({
                cache: true,
                type: "get",
                url:"customer-transaction.php?action=customer_transaction_search&search_transaction_index="+$("#search_transaction_index").val(),
               
                async: true,
                error: function(request) {
                    // alert(request);
                },
                success: function(data) {
                    //alert("success");
                    window.location.href="customer-transaction.php?action=customer_transaction_search&search_transaction_index="+$("#search_transaction_index").val();

                }
            });
        }
        
        return false;
    });

    $(".customer_pay_order").on('click',function(){        //customer pay for order
        $("#customer_pay_order_id").text($(this).attr("customer_pay_order_id_click"));
    	//alert($("#customer_pay_order_id").text());
        $.ajax({
            cache:true,
            type:"get",
            url:"customer.php?action=customer_pay_order&customer_pay_order_id="+$("#customer_pay_order_id").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){
                //alert(data);
                alert("paid successfully!");
                //alert($("#customer_pay_order_id").text());
            }
        });
        location.reload();
        return false;
    });

    $(".customer_delete_order").on('click',function(){          //customer delete order modal open
        $("#customer_delete_order_modal").modal('open');
        $("#customer_delete_order_id_index").text($(this).attr("customer_del_order_id_index"));

        //alert($(delete_product_id_index).text());
    });

    $("#customer_confirm_delete_this_order").on('click',function(){      //customer confirm to delete this order
        $.ajax({
            cache:true,
            type:"get",
            url:"customer.php?action=customer_order_delete&customer_delete_order_id_index="+$("#customer_delete_order_id_index").text(),
            
            async:true,
            error:function(request){
                alert(request);
                //alert("kk");
            },
            success:function(data){

                $("#message10").html(data);

            }
        });
        location.reload();
        return false;
    });

    $("#customer_cancel_delete_this_order").on('click',function(){  //customer cancel delete this order
        $("#customer_delete_order_modal").modal('close');
    });


</script>