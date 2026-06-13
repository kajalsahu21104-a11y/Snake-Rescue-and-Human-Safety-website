//
// var startPage = 1;
// var startLimit = 5;

$(document).ready(function () {
  verifyToken();
});
function verifyToken() {
  var token = sessionStorage.getItem("_auth_token_");
  $.ajax({
    type:"POST",
    url:"../adminApi/auth/adminVerify.php",
    data:{
      token:token
    },
    success:function () {

    },
    error:function (error) {
      window.location="../admin.html";
    }

  })
}


$(document).ready(function () {
  dyNamicPagesRequest("brands.php");
  $(".collapse_item").each(function () {
    $(this).click(function () {
      var link = $(this).attr("access-link");
      dyNamicPagesRequest(link);
    });
  })
})


function dyNamicPagesRequest(link){
  $.ajax({
    type:"GET",
    url:"dynamicPage/"+link,
    xhr:function() {
      var req = new XMLHttpRequest();
      req.onprogress = function (e) {
        var per = (e.loaded*100)/e.total;
        // console.log(e);
        var design = `
        <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        <span role="status">Loading...</span>
        <span>${per}%</span>
        </button>
        `;
        $("#page").html(design);
      }
      return req;
    },
    success:function (res) {
      if (link=="category.php") {
        getCategoryList(1,5)
      }
      $("#page").html(res);

  // category page coding start
      // add field input creation code start
      $("#add_field_btn").click(function () {
        var input = document.createElement("INPUT");
        input.className = "form-control category_input mb-2 border-0";
        var plac = $(".category_input:first").attr("placeholder");
        input.placeholder=plac;
        // console.log(plac);
        $(".category_fields_area").append(input);
      });
      // add field input creation code end

      // create category code start
        $("#category_form").submit(function (e) {
          e.preventDefault();
          var allcategory=[];
          var len = $(".category_input").length;
          for (var i = 0; i <len; i++) {
            var cname = document.getElementsByClassName("category_input")[i].value;
            allcategory.push(cname);
          }
          var stringData = JSON.stringify(allcategory);
          $.ajax({
            type:"POST",
            url:"../adminApi/commanApi/categoryApi.php",
            beforeSend:function () {
              $("#createLoadingIcon").removeClass("d-none");
              $("#createCatBtn").attr("disabled",true);
            },
            data:{
              category:stringData,
              token:sessionStorage.getItem("_auth_token_")
            },
            success:function (res) {
              $("#createCatBtn").removeAttr("disabled");
              $("#createLoadingIcon").addClass("d-none");
              var data = JSON.parse(res);
              $("#Create_categoryAlert").removeClass("d-none");
              $("#Create_categoryAlert").addClass("alert-success");
              document.getElementById("Create_categoryAlert").innerHTML= data.msg;
              setTimeout(function () {
                $("#Create_categoryAlert").addClass("d-none");
                $("#Create_categoryAlert").removeClass("alert-success");
                document.getElementById("Create_categoryAlert").innerHTML= "";
              },3000);
              getCategoryList(1,5)


            },
            error:function (error) {
                $("#createCatBtn").removeAttr("disabled");
              $("#createLoadingIcon").addClass("d-none");
              $("#Create_categoryAlert").removeClass("d-none");
              $("#Create_categoryAlert").addClass("alert-danger");
              document.getElementById("Create_categoryAlert").innerHTML= "Unauthorized User";
              setTimeout(function () {
                $("#Create_categoryAlert").addClass("d-none");
                $("#Create_categoryAlert").removeClass("alert-danger");
                document.getElementById("Create_categoryAlert").innerHTML= "";
              },3000);
            }
          })
        });
      // create category code end

      // create category code next or prev start
          $("#next").click(function () {
            var next = $(this).attr("next-page");
            getCategoryList(next,5);
            });
          $("#prev").click(function () {
        var prev = $(this).attr("prev-page");
        getCategoryList(prev,5);
      });
      // create category code next or prev end

// category page coding end

// brands page coding start
    // add brands coding start
      $("#add_brand-fild").click(function () {
        var input = document.createElement("INPUT");
        input.className = "form-control brands_input my-2";
        input.placeholder="Dell";
        $("#brand_fild_area").append(input);
      });
    // add brands coding end
        if (link=="brands.php") {
          getAllCategory();
        }
// brands page coding end

    }


  })
}


function getCategoryList(startPage,startLimit) {
  var page = startPage;
  var limit = startLimit;
    $.ajax({
      type:"GET",
      url:"../adminApi/commanApi/getCategory.php",
      data:{
        page:page,
        limit:limit,
        token:sessionStorage.getItem("_auth_token_")
      },
      beforeSend:function () {
        $("#catgorylistLoader").removeClass("d-none");
      },
      success:function (res) {
        $("#catgorylistLoader").addClass("d-none");
        var obj = JSON.parse(res);
        var countTotal = obj.total;

        // prev button coding start
         if (page==1) {
           $("#prev").css({
             'opacity':'0',
             'zIndex':"-2"
           })
         }else {
           $("#prev").css({
             'opacity':'1',
             'zIndex':"1"
           })
           var prevPage = Number(obj.page)-Number(obj.limit);
           $("#prev").attr("prev-page",prevPage);

         }
         // prev button coding end
         var nextPage = Number(obj.page)+Number(obj.limit);
         if (nextPage>=countTotal) {
           $("#next").css({
             'opacity':'1',
             'zIndex':"1"
           })
           $("#next").attr("next-page",1);
         }

         if (nextPage>1 && nextPage<countTotal) {
           $("#next").css({
             'opacity':'1',
             'zIndex':"1"
           })
           $("#next").attr("next-page",nextPage);
         }
        document.getElementById("tableList").innerHTML= `
        <tr>
        <th> Category Name</th>
        <th> Create Date</th>
        <th> Action</th>
        </tr>
        `;
        for (var i = 0; i < obj.data.length; i++) {
        var category_name =  obj.data[i].category_name;
        var createdAt =  obj.data[i].createdAt;
        var id = obj.data[i].id;
        // var time = new time(createdAt);

        var date = new Date(createdAt);
        var month = date.getMonth()+1;
        var year = date.getFullYear();
        var day = date.getDate();
        if (day < 10) {
          day = '0' + day;
        }
        if (month < 10){
          month = '0' + month;
        }

        var design = `
        <tr>
        <td>${category_name}</td>
        <td>${day+"/"+month+"/"+year}</td>
        <td>
        <button  dataid="${id}"  dataName="${category_name}" class="btn btn-success rounded-circle category_editBtn"> <i class="fa fa-edit" ></i></button>
        <button dataid="${id}" class="btn btn-danger rounded-circle category_deleteBtn"> <i class="fa fa-trash" ></i></button>
        </td>
        </tr>
        `
        document.getElementById("tableList").innerHTML+=design;
        }
        $(".category_deleteBtn").click(function () {
              var reqid = $(this).attr("dataid");
            $("#confirmModal").modal('show');
            $("#deleteYesBtn").click(function () {
              $.ajax({
                type:"POST",
                url:"../adminApi/commanApi/deleteCategoryApi.php",
                data:{
                  id:reqid,
                  token:sessionStorage.getItem("_auth_token_")
                },
                beforeSend:function () {
                  $("#category_notification_msg").html("Please Wait....");
                  $("#deleteYesBtn").attr('disabled',true);
                },
                success:function () {
                  $("#confirmModal").modal('hide');
                  $("#category_notification_msg").html("");
                  $("#deleteYesBtn").removeAttr('disabled');
                  var toastElList = [].slice.call(document.querySelectorAll('#delete_Category_msg'))
                    var toastList = toastElList.map(function(toastEl) {
                      return new bootstrap.Toast(toastEl)
                    })
                    toastList.forEach(toast => toast.show())
                    getCategoryList(1,5)
                    $("#delete_cate_innlineMessage").html("Delete Success");
                    setTimeout(function () {
                      toastList.forEach(toast => toast.hide())
                    },3000)

                },
                error:function () {

                }
              })
            });
        });

        // category edit code start
        $(".category_editBtn").click(function () {
          var id = $(this).attr("dataid");
          var name = $(this).attr("dataName");
          $("#cat_EditModal").modal('show');
          $("#cate_editInput").val(name);
          $("#edit_catBtn").click(function () {
            $.ajax({
              type:"POST",
              url:"../adminApi/commanApi/editCategoryApi.php",
              data:{
                token:sessionStorage.getItem("_auth_token_"),
                id:id,
                name:$("#cate_editInput").val()

              },
              beforeSend:function () {
                $("#cancelBtn").addClass('d-none');
                $("#edit_catBtn").html('Please Wait');
                $("#edit_catBtn").attr('disabled',true);
              },
              success:function (res) {
                $("#cat_EditModal").modal('hide');
                $("#cancelBtn").removeClass('d-none');
                $("#edit_catBtn").html('Save Changes');
                $("#edit_catBtn").removeAttr('disabled');
                var toastElList = [].slice.call(document.querySelectorAll('#delete_Category_msg'))
                  var toastList = toastElList.map(function(toastEl) {
                    return new bootstrap.Toast(toastEl)
                  })
                  toastList.forEach(toast => toast.show())
                  getCategoryList(1,5)
                  $("#delete_cate_innlineMessage").html("Edit Saved");
                  setTimeout(function () {
                    toastList.forEach(toast => toast.hide())
                  },3000)
              },
              error:function (error) {
                $("#cat_EditModal").modal('hide');
                $("#cancelBtn").removeClass('d-none');
                $("#edit_catBtn").html('Save Changes');
                $("#edit_catBtn").removeAttr('disabled');
                var toastElList = [].slice.call(document.querySelectorAll('#delete_Category_msg'))
                  var toastList = toastElList.map(function(toastEl) {
                    return new bootstrap.Toast(toastEl)
                  })
                  toastList.forEach(toast => toast.show())
                  getCategoryList(1,5)
                  $("#delete_cate_innlineMessage").html("Update Failed Try After Some Time");
                  setTimeout(function () {
                    toastList.forEach(toast => toast.hide())
                  },3000)
              }
            })
          });
        });

        // category edit code end
      },
      error:function (error) {
        $("#catgorylistLoader").addClass("d-none");
        document.getElementById("tableList").innerHTML= `
        <tr>
        <th> Category Name</th>
        <th> Create Date</th>
        <th> Action</th>
        </tr>
        `;
        var design = `<tr align="center">
        <td colspan="3" >No Category Found </td>
        </tr>`
          document.getElementById("tableList").innerHTML+=design;
      }
    })

}

function getAllCategory() {
  $.ajax({
    type:"GET",
    url:"../adminApi/commanApi/getAllCategoryApi.php",
    data:{
      token:sessionStorage.getItem("_auth_token_")
    },
    success:function (res) {
      var data = JSON.parse(res);
      $(data.data).each(function (index,data) {
        var id = data.id;
        var cat_name = data.category_name;
        var option = document.createElement("OPTION");
        option.innerHTML=cat_name;
        $("#cate_selecttag").append(option);
      })
    }
  })

}
