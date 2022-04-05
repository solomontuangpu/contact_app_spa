<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact App SPA</title>
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<style>
    .contact {
        cursor: pointer;
    }
</style>
<body class="bg-dark">
    
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Contact App</h4>

                            <div class="">
                                <button class="btn btn-outline-primary" onclick="showList()">
                                    <i class="fas fa-th-list"></i>
                                </button>
                                <button class="btn btn-outline-primary" onclick="showGrid()">
                                    <i class="fas fa-th-large"></i>
                                </button>
                            </div>
                                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="fas fa-user-circle"></i>
                                    Add Contact
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title me-3" id="addLabel">
                                            <i class="fas fa-user text-primary"></i>
                                            Add Contact
                                        </h5>
                                       
                                        <span id="message"></span>
                                      
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="save.php" method="post" id="addContact">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                   
                                                    <label class="col-form-label for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                   
                                                </div>
                                                <div class="col-12 col-md-6">
                                                   
                                                    <label class="col-form-label for="phone">Phone</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control">
                                                      
                                                 </div> 
                                                 <div class="col-12">
                                                    <div class="mt-3 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                 </div>                                       
                                            </div>
                                        </form>
                                    </div>
                                  
                                    </div>
                                </div>
                            </div>
                            
                            <!-- edit Contact -->
                            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title me-3" id="editLabel">
                                            <i class="fas fa-user text-primary"></i>
                                            Edit Contact
                                        </h5>
                                       
                                        <span id="updateMessage"></span>
                                      
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="update.php" method="post" id="updateContact">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                   
                                                    <label class="col-form-label for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control editName">
                                                    <input type="hidden" name="id" id="editId">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                   
                                                    <label class="col-form-label for="phone">Phone</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control editPhone">
                                                      
                                                 </div> 
                                                 <div class="col-12">
                                                    <div class="mt-3 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                 </div>                                       
                                            </div>
                                        </form>
                                    </div>
                                  
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                       <div id="listTable">

                       </div>
                    </div>
                </div>
            </div>
         
              
        </div>
    </section>
    

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
    <script>

        function showGrid() {
            $.get('grid.php', function(data) {
               $("#listTable").html(data);
            })
        }
        function showList() {
            $.get('list.php', function(data) {
               $("#listTable").html(data);
            })
        }

        //add Contact
        $("#addContact").on('submit', function(e) {
            e.preventDefault();

            let input = $( this ).serialize();
            // $.ajax({
            //     type: "POST",
            //     url: $(this).attr("action"),
            //     data: input,
            //     success:function(res) {
            //         console.log( res );
            //     },
              
            // });

            $.post($(this).attr("action"),input, function(res) {


                 if(res == "success") {
                    
                    $("#message").html("<span class='badge rounded-pill bg-success'>Successfully Added!</span>");
                    $("input").val("");
                    showList();
                 } else {
                    $("#message").html("<span class='badge rounded-pill bg-danger'>Fail to add contact!</span>");
                 }
            })

        })

        showList();

        //deleteContact
        $("#listTable").delegate(".del", "click", function() {
            let currentId = $(this).attr("data-id");
            $.get("delete.php?id="+currentId, function(res) {
                console.log(res)
                if(res == "success") {
                   showList();
                }
            })
        })

        //Show Old Data in Form Value
        $("#listTable").delegate(".edit", "click", function() {
            let currentId = $(this).attr("data-id");

            $.get("detail.php?id="+currentId, function(data){
                let currentText = JSON.parse(data);
                $(".editName").val(currentText.name);
                $(".editPhone").val(currentText.phone);
                $("#editId").val(currentText.id);
                $("#edit").modal("show");
            })
        })

        //updateContact
        $("#updateContact").on("submit", function(e) {
            e.preventDefault();

            let input = $( this ).serialize();

            $.post($(this).attr("action"),input, function(res) {
                if(res == "success") {
                    $("#updateMessage").html("<span class='badge rounded-pill bg-success'>Successfully Updated!</span>");
                    $("input").val("");
                    showList();
                    $("#edit").modal("hide");
                } else {
                    $("#updateMessage").html("<span class='badge rounded-pill bg-danger'>Fail to update contact!</span>");
                }
            })
        })

        // $("#listTable").delegate(".contact", "click", function() {
        //     let currentId = $(this).attr("data-id");

        //     alert(currentId);
        // })

    </script>
  
</body>
</html>