<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WAKIMart</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body >
        <br><br>
       <div class="container fluid">
           <div class="row">
               <div class="col-sm-10">
                   <h2>User WakiMart</h2>
               </div>
               <div class="col-sm-2">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambah" onclick="muncul()">+ Tambah User</button>
               </div>
           </div>
           <div class="row">
               <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="bodyData">
                       
                    </tbody>
               </table>
           </div>
       </div>
    </body>
    <div class="modal fade in" id="modaltambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Tambah User</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" onclick="hide_modal('modaltambah')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-sm-2">
                            <label>Nama</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Tuliskan nama anda.." required>

                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                        <div class="col-sm-2">
                            <label>E-mail</label></div>
                            <div class="col-sm-10">

                            <input type="email" id="email" name="email" class="form-control" placeholder="Tuliskan alamat e-mail anda.." required></div>
                        </div>
                      
                       
                        
                    
                </div>
                <div class="modal-footer">
                            
                                <input type="submit" id="submit" class="btn btn-success" value="Submit">
                                   
                         
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade in" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit User</h4>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" onclick="hide_modal('modaledit')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" id="edit_id" name="edit_id" class="form-control" style="display:none" required>

                        <div class="form-group row">
                            <div class="col-sm-2">
                            <label>Nama</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" id="edit_name" name="edit_name" class="form-control" placeholder="Tuliskan nama anda.." required>

                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                        <div class="col-sm-2">
                            <label>E-mail</label></div>
                            <div class="col-sm-10">

                            <input type="email" id="edit_email" name="edit_email" class="form-control" placeholder="Tuliskan alamat e-mail anda.." required></div>
                        </div>
                      
                       
                        
                    
                </div>
                <div class="modal-footer">
                            
                                <input type="submit" id="submit_edit" class="btn btn-success" value="Submit">
                                   
                         
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript">

        function muncul(){
            $("#modaltambah").modal('show');
        }
        function hide_modal(nama){
            $("#"+nama).modal('hide');
        }
        function edit(id,name,email){
            $("#modaledit").modal('show');
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_name").value = name;
            document.getElementById("edit_email").value = email;

        }
        function hapus(id){
            var delete_id = id;
            $.ajax({
                url:'{{url("/userData/delete")}}',
                method:'POST',
                data:{"_token": "{{csrf_token()}}","delete_id":delete_id},
                dataType:"json",
                success:function(data) {
                    console.log(data);
                    var datahasil = data.data;
                    var bodyData = '';
                    var i = 1;
                    $.each(datahasil,function(index,row){
                        bodyData+="<tr>";
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td><button type='button' class='btn btn-warning' onclick='edit("+row.id+",`"+row.name+"`,`"+row.email+"`)'>Edit</button>-<button type='button' class='btn btn-danger' onclick='hapus("+row.id+")'>Delete</button></td>";
                        bodyData+="</tr>";
                    })
                    $("#bodyData").empty();
                    $("#bodyData").append(bodyData);
                }
            });
        }
        $(document).ready(function() {
            $.ajax({
                url:'{{url("/userData/get")}}',
                method:'POST',
                data:{"_token": "{{csrf_token()}}"},
                dataType:"json",
                success:function(data) {
                    console.log(data);
                    var datahasil = data.data;
                    var bodyData = '';
                    var i = 1;
                    $.each(datahasil,function(index,row){
                        bodyData+="<tr>";
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td><button type='button' class='btn btn-warning' onclick='edit("+row.id+",`"+row.name+"`,`"+row.email+"`)'>Edit</button>-<button type='button' class='btn btn-danger' onclick='hapus("+row.id+")'>Delete</button></td>";
                        bodyData+="</tr>";
                    })
                    $("#bodyData").append(bodyData);
                }
            });
        });
        $("#submit").click(function(e) {
            e.preventDefault();
            var name = $("#name").val(); 
            var email = $("#email").val();
            $.ajax({
                url:'{{url("/userData")}}',
                method:'POST',
                data:{"_token": "{{csrf_token()}}","name":name,"email":email},
                dataType:"json",
                success:function(data) {
                    console.log(data);
                    var datahasil = data.data;
                    var bodyData = '';
                    var i = 1;
                    $.each(datahasil,function(index,row){
                        bodyData+="<tr>";
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td><button type='button' class='btn btn-warning' onclick='edit("+row.id+",`"+row.name+"`,`"+row.email+"`)'>Edit</button>-<button type='button' class='btn btn-danger' onclick='hapus("+row.id+")'>Delete</button></td>";
                        bodyData+="</tr>";
                    })
                    $("#bodyData").empty();
                    $("#bodyData").append(bodyData);
                }
            });
        });
        $("#submit_edit").click(function(e) {
            e.preventDefault();
            var edit_id = $("#edit_id").val(); 
            var edit_name = $("#edit_name").val(); 
            var edit_email = $("#edit_email").val();
            $.ajax({
                url:'{{url("/userData/edit")}}',
                method:'POST',
                data:{"_token": "{{csrf_token()}}","edit_id":edit_id,"edit_name":edit_name,"edit_email":edit_email},
                dataType:"json",
                success:function(data) {
                    console.log(data);
                    var datahasil = data.data;
                    var bodyData = '';
                    var i = 1;
                    $.each(datahasil,function(index,row){
                        bodyData+="<tr>";
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td><button type='button' class='btn btn-warning' onclick='edit("+row.id+",`"+row.name+"`,`"+row.email+"`)'>Edit</button>-<button type='button' class='btn btn-danger' onclick='hapus("+row.id+")'>Delete</button></td>";
                        bodyData+="</tr>";
                    })
                    $("#bodyData").empty();
                    $("#bodyData").append(bodyData);
                }
            });
        });
        
    </script>
</html>
