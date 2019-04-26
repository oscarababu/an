$(function () {
    'use strict';

    var LOCAL_URL = 'http://127.0.0.1:8000/';

    populate_page_table();
    $("#gallery_mng_ui").show();
    $("#gallery_mng").css({"background":"#f7f7f7"});

    $(".ins_tabs").click(function(){
		var id = $(this).attr('id');
		$(".tabb").css({"background":""});
		$("#"+id).css({"background":"#f7f7f7"});
		$(".tab_ui").hide();
		$("#"+id+"_ui").show();
		$(".res").empty();
		
	});
	
	$(".ins_tabs2").click(function(){
		var id = $(this).attr('id');
		$(".tabb").css({"background":""});
		$("#"+id).css({"background":"#f7f7f7"});
		$(".tab_ui").hide();
		$("#"+id+"_ui").show();
		$(".res").empty();
		
    });


    $("#btn_create_new_page").click(function(){
		var type = $("#sel_type").val();
		var page = $("#ipt_page").val();
		var top_link = $("#chk_top_link").val() == 'ON' ? 1 : 0;
		var home_link = $("#chk_home_link").val() == 'ON' ? 1 : 0;
		var in_page = $("#chk_in_page_link").val() == 'ON' ? 1 : 0;
		
		if(type !="" && page !=""){

            axios({
                url:LOCAL_URL+'new_page',
                method:'POST',
                data: {page:page,type:type,top_link:top_link,home_link:home_link,in_page:in_page}
              }).then(function(res){
                    //console.log(res.data);
			
					if(res.data.status == 1){
                        $(".msg").html(
                            "<div class='alert alert-success' role='alert'>"+
                            "Success: "+page+" Page Created Successfully"+
                            "</div>"
                          );
						
                        $("#ipt_page").val('');
						$("#sel_type").val('');
						$("#chk_top_link").attr("checked", false);
						$("#chk_home_link").attr("checked", false);
						$("#chk_in_page_link").attr("checked", false);
					}else{
                        $(".msg").html(
                            "<div class='alert alert-danger' role='alert'>"+
                            "Error: Page exists"+
                            "</div>"
                          );
                    }
                    
					populate_page_table();
              }).catch(function(err){
                console.log(err);
              });          
            
			
		}else{

            $(".msg").html(
                "<div class='alert alert-danger' role='alert'>"+
                "Error: Value(s) Missing"+
                "</div>"
              );
		}
		
    });
    

    $("#btn_edit_page").click(function(){
		var page = $("#ipt_page").val();
		var id = $("#hdn_page_id").val();
		var top_link = $("#chk_top_link").val() == 'ON' ? 1 : 0;
		var home_link = $("#chk_home_link").val() == 'ON' ? 1 : 0;
		var in_page = $("#chk_in_page_link").val() == 'ON' ? 1 : 0;
        var type = $("#sel_type").val();
        
        axios({
            url:LOCAL_URL+'update_page_data',
            method:'POST',
            data:{page:page,id:id,top_link:top_link,home_link:home_link,in_page:in_page,type:type}
          }).then(function(res){
            
            var json = res.data;
            
            if(json.status == 1){
              $(".msg").html(
                "<div class='alert alert-success' role='alert'>"+
                "Success: "+page+" Edited"+
                "</div>"
              );
                
                populate_page_table();
                $("#btn_create_new_page").show();
                $("#btn_edit_page").hide();
                $("#ipt_page").val('');
                $("#sel_type").val('');
                $("#chk_top_link").attr("checked", false);
                $("#chk_home_link").attr("checked", false);
                $("#chk_in_page_link").attr("checked", false);
                
            }
            
        }).catch(function(err){
            console.log(err);
          }); 
		
    });
    

    $("body").on("click",".btn_update_page_chk", function(){
		var rel = $(this).attr('rel');
		var id = $(this).attr('id').split("_");
		
		var one = $('.chckx_page_one_'+rel).val();
		var two = $('.chckx_page_two_'+rel).val();
		var three = $('.chckx_page_three_'+rel).val();
		
		var page = one + "_" + two + "_" + three;
		
        
        axios({
            url:LOCAL_URL+'update_page_chk_blk',
            method:'POST',
            data: {id:rel,page:page}
          }).then(function(res){
            
            $(".msg").html(
              "<div class='alert alert-success' role='alert'>"+
              "Update Successful"+
              "</div>"
            );
          }).catch(function(err){
            console.log(err);
          }); 
		
  });
  

  $("body").on("click",".edit_page", function(){

    var id = $(this).attr('id').split("_");
    
    axios({
      url:LOCAL_URL+'fetch_edit_page_data',
      method:'POST',
      data: {page_id:id[2],type:id[1]}
    }).then(function(res){
      var json = res.data;
      
      $("#ipt_page").val(json.page);
      $("#hdn_page_id").val(json.id);
      
      if(json.top_link == 1){ $("#chk_top_link").val('ON');}else{$("#chk_top_link").val('OFF');}
      if(json.home_link == 1){ $("#chk_home_link").val('ON');}else{$("#chk_home_link").val('OFF');}
      if(json.in_page_link == 1){ $("#chk_in_page_link").val('ON');}else{$("#chk_in_page_link").val('OFF');}
      $("#sel_type").val(json.type);
      
      $('.msg').html("<h4 style='color:green;margin-left:10px;'>Edit: "+json.page+"<h4>");
      $("#btn_create_new_page").hide();
      $("#btn_edit_page").show();
        
    }).catch(function(err){
      console.log(err);
    }); 

  });
  

  $("body").on("click",".del_page", function(){
		
		var conf = confirm("Are you Sure you want to delete this page?");
		if(conf == true){
			var id = $(this).attr('id').split("_");
      console.log(id);
      
      axios({
        url:LOCAL_URL+'delete_page',
        method:'POST',
        data: {id:id[2],curr_status:id[3]}
      }).then(function(res){
        var json = JSON.parse(res.data);
        if(json.status==1){
          $(".msg").html(
            "<div class='alert alert-success' role='alert'>"+
            "Page Deleted Successfully"+
            "</div>"
          );
         
          populate_page_table();
        }
      }).catch(function(err){
        console.log(err);
      }); 
		}
	});


    function populate_page_table(){

        axios({
            url:LOCAL_URL+'pages_report_data',
            method:'POST',
          }).then(function(res){
                //console.log(res.data);
                var json = res.data;
                var new_status = "";
                var update_status = "";
                var status_value = "";
                var new_top_link = "";
                var new_home_link = "";
                var new_in_page_link = "";
                var table = "<tr><th>Page</th><th>Top Bar</th><th>Home Page</th><th>In Page</th><th>Status</th><th></th><th></th><th COLSPAN=2>Order Page</th></tr>";
                var info_table = "<tr><th>Page</th><th>Top Bar</th><th>Home Page</th><th>In Page</th><th>Status</th><th></th><th></th><th COLSPAN=2>Order Page</th></tr>";
                var i = 1;
                var j = 1;
                
                $.each(json[0].res_gallery,function(index,value){
                    if(value.status == 1){
                        new_status = "Active";
                        update_status = 1;
                        status_value = "Delete";
                    }else{
                        new_status = "InActive";
                        update_status = 0;
                        status_value = "Activate";
                    }

                    if(value.top_link == 0){new_top_link = 'OFF';}else{new_top_link = 'ON';}
                    if(value.home_link == 0){new_home_link = 'OFF';}else{new_home_link = 'ON';}
                    if(value.in_page_link == 0){new_in_page_link = 'OFF';}else{new_in_page_link = 'ON';}
                    
                    if(i == 1){
                        
                        table = table + "<tr><td>"+value.page+"</td><td>"+new_top_link+"</td><td>"+new_home_link+"</td><td>"+new_in_page_link+"</td><td>"+new_status+"</td><td><a href='#' class='edit_page' id='edit_"+value.type+"_"+value.id+"' >Edit</a></td><td><a href='#' class='del_page' id='del_page_"+value.id+"_"+update_status+"' >"+status_value+"</a></td><td>UP</td><td><a href='#' class='order_up_n_down' id='down_"+value.id+"'>DOWN</a></td></tr>";
                    
                    }else if(i == parseInt(json[0].num_rows_gallery)){
                        
                        table = table + "<tr><td>"+value.page+"</td><td>"+new_top_link+"</td><td>"+new_home_link+"</td><td>"+new_in_page_link+"</td><td>"+new_status+"</td><td><a href='#' class='edit_page' id='edit_"+value.type+"_"+value.id+"' >Edit</a></td><td><a href='#' class='del_page' id='del_page_"+value.id+"_"+update_status+"' >"+status_value+"</a></td><td><a href='#' class='order_up_n_down' id='up_"+value.id+"'>UP</a></td><td>DOWN</td></tr>";
                    
                        
                    }else{
                        table = table + "<tr><td>"+value.page+"</td><td>"+new_top_link+"</td><td>"+new_home_link+"</td><td>"+new_in_page_link+"</td><td>"+new_status+"</td><td><a href='#' class='edit_page' id='edit_"+value.type+"_"+value.id+"' >Edit</a></td><td><a href='#' class='del_page' id='del_page_"+value.id+"_"+update_status+"' >"+status_value+"</a></td><td><a href='#' class='order_up_n_down' id='up_"+value.id+"'>UP</a></td><td><a href='#' class='order_up_n_down' id='down_"+value.id+"'>DOWN</a></td></tr>";
                    
                    }
                    
                    ++i;
                });

                var new_top_link_info = "";
                var new_home_link_info = "";
                var new_in_page_link_info = "";

                $.each(json[0].res_info,function(index,value){
                            
                    if(value.status == 1){
                        new_status = "Active";
                        update_status = 1;
                        status_value = "Delete";
                    }else{
                        new_status = "InActive";
                        update_status = 0;
                        status_value = "Activate";
                    }
                    
                    if(value.top_link == 0){new_top_link_info = 'OFF';}else{new_top_link_info = 'ON';}
                    if(value.home_link == 0){new_home_link_info = 'OFF';}else{new_home_link_info = 'ON';}
                    if(value.in_page_link == 0){new_in_page_link_info = 'OFF';}else{new_in_page_link_info = 'ON';}
                    
                    if(j == 1){
                        
                        info_table = info_table + "<tr><td>"+value.page+"</td><td>"+new_top_link_info+"</td><td>"+new_home_link_info+"</td><td>"+new_in_page_link_info+"</td><td>"+new_status+"</td><td><a href='#' class='edit_page' id='edit_"+value.type+"_"+value.id+"' >Edit</a></td><td><a href='#' class='del_page' id='del_page_"+value.id+"_"+update_status+"' >"+status_value+"</a></td><td>UP</td><td><a href='#' class='order_up_n_down' id='down_"+value.id+"'>DOWN</a></td></tr>";
                    
                    }else if(j == parseInt(json[0].num_rows_info)){
                        
                        info_table = info_table + "<tr><td>"+value.page+"</td><td>"+new_top_link_info+"</td><td>"+new_home_link_info+"</td><td>"+new_in_page_link_info+"</td><td>"+new_status+"</td><td><a href='#' class='edit_page' id='edit_"+value.type+"_"+value.id+"' >Edit</a></td><td><a href='#' class='del_page' id='del_page_"+value.id+"_"+update_status+"' >"+status_value+"</a></td><td><a href='#' class='order_up_n_down' id='up_"+value.id+"'>UP</a></td><td>DOWN</td></tr>";
                    
                        
                    }else{
                        info_table = info_table + "<tr><td>"+value.page+"</td><td>"+new_top_link_info+"</td><td>"+new_home_link_info+"</td><td>"+new_in_page_link_info+"</td><td>"+new_status+"</td><td><a href='#' class='edit_page' id='edit_"+value.type+"_"+value.id+"' >Edit</a></td><td><a href='#' class='del_page' id='del_page_"+value.id+"_"+update_status+"' >"+status_value+"</a></td><td><a href='#' class='order_up_n_down' id='up_"+value.id+"'>UP</a></td><td><a href='#' class='order_up_n_down' id='down_"+value.id+"'>DOWN</a></td></tr>";
                    
                    }
                    
                    ++j;
                });

                $("#pages_report").html(table);
                        
                $("#info_pages_report").html(info_table);

          }).catch(function(err){
            console.log(err);
          }); 


          //Gallery Page Data
          axios({
            url:LOCAL_URL+'gallery_report_data',
            method:'POST',
          }).then(function(res){
            //console.log(res.data);
            var json = res.data;
            var tbl_data = "<tr><th>No.</th><th>Page</th><th>First Page</th><th>Two Page</th><th>Third Page</th><th></th></tr>";
            var page_data = "";
            var no = 1;
            
            $.each(json.gallery_items,function(index,value){
                var split_page = value.page.split("_");
                    //console.log(split_page);
                   
                $.each(json.pagez,function(index2,value2){
                    page_data = page_data + "<option value='"+value2.page_id+"'>"+value2.act_page+"</option>";
                });
                //console.log(page_data);
                tbl_data = tbl_data + "<tr><td>"+no+"</td><td>"+value.title+"</td><td><select class='chckx_page_one_"+value.id+"'><option value='"+value.one_id+"' >"+value.one+"</option>"+page_data+"<option value='0'></option></select></td><td><select class='chckx_page_two_"+value.id+"'><option value='"+value.two_id+"' >"+value.two+"</option>"+page_data+"<option value='0'></option></select></td><td><select class='chckx_page_three_"+value.id+"' ><option value='"+value.three_id+"'>"+value.three+"</option>"+page_data+"<option value='0'></option></select></td><td><input id='chk_page_id_"+value.id+"' rel='"+value.id+"' class='btn_update_page_chk' type='button' value='Update' /></td></tr>";
                var page_data = "";
                ++no;
            });

            $("#gallery_report").html(tbl_data);
            
          }).catch(function(err){
            console.log(err);
          }); 
        
        

}

    
    
});