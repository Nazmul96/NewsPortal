            function sendValue(s){
                "use strict";

                var name = s.split(",")[0];
                var title = s.split(",")[1];
                var base_url = $('#base_url').val();
                var imageLink = $('#imageLink').val();
                var img = '<img class="img-responsive img-thumbnail" src="'+imageLink+'uploads/thumb/'+name+'" height="100" width="100"/>';
                window.opener.document.getElementById('image_alt').value = title;
                window.opener.document.getElementById('image_title').value = title;
                window.opener.document.getElementById('priview').innerHTML=img;
                window.opener.document.getElementById('lib_file_selected').value = name;
                window.close();
                
            }


            //media image search
            function searchMform(){
                "use strict";
                var formdata = new FormData($("#SeForm")[0]);

                $.ajax({
                    url: $("#SeForm").attr("action"),
                    type: $("#SeForm").attr("method"),
                    data: formdata, 
                    processData: false,
                    contentType: false,
                   'success': function (data) {
                        $("#searchResult").html(data);
                    },
                    error: function (xhr, desc, err){
                        alert('failed');
                    }
                });
            }


            //media image upload
            function imagesUpload(){
                "use strict";

                var formdata = new FormData($("#imgfname")[0]);
                var url = $("#imgfname").attr("action");
                var method = $("#imgfname").attr("method");
                var base_url = $("#base_url").val();
                var url =  base_url+'backend/ajax_data/imageUpload';


                $.ajax({
                    url: url,
                    type: method,
                    data: formdata, 
                    processData: false,
                    contentType: false,
                   'success': function (res) {

                    console.log(res);
                        if(res=='1'){
                            toastr.success('Upload successful');
                        }

                        if(res=='0'){
                            toastr.error('Error! - This File Not allowed!');
                        }

                        if(res=='2'){
                            toastr.error('Error! - Please upload image smaller than 1MB!');
                        }

                        $("#readi").load(location.href + " #readi");
                        window.location.href = window.location.href;

                    },

                    error: function (xhr, desc, err){
                        toastr.error('Error!');
                    }
                });
            }


            //upload image preview show
            var loadFile = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                  var output = document.getElementById('output');
                  output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };

            //check upload image
            $("body").on("change", "#upimg", function (e) {
                var file = (this.files[0].name);
                var size = (this.files[0].size);
                var ext = file.substr( (file.lastIndexOf('.') +1) );

                if(ext!=='jpg' && ext!=='JPG' && ext!=='png' && ext!=='PNG' && ext!=='jpeg' && ext!=='JPEG' && ext!=='webp' && ext!=='gif' ){
                   toastr.error('Error! -Please upload file jpg | png | jpeg | pdf | gif ');
                   $(this).val('');
                }
                // chec size
                if(size > 1000000) {
                    toastr.error('Error! -Please upload file less than 1MB. Thanks!');
                   $(this).val('');

                }
            });