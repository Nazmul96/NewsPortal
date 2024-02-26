

            function handleFiles(event) {
                "use strict";

                var files = event.target.files;
                var file = (files[0].name);
                var size = (files[0].size);
                var ext = file.substr( (file.lastIndexOf('.') +1) );

                if(ext!=='jpeg' && ext!=='mp3' && ext!=='MP3' && ext!=='mp4' && ext!=='MP4'){
                   toastr.error('Error! -Please upload file mp3 | mp4 ');
                   $(this).val('');
                }
                // chec size
                // if(size > 15*1024) {
                //     toastr.error('Error! -Please upload file less than 15MB. Thanks!');
                //    $(this).val('');
                // }

                if(ext==='mp4'){
                    var preView = '<i class="fas fa-trash float-left text-danger deleteId" onClick="deletePodcust()"></i><video class="deleteId" width="220" height="150" controls><source src="'+URL.createObjectURL(files[0])+'" type="video/mp4"></video>';
                }
                if(ext==='mp3'){
                    var preView ='<i class="fas fa-trash float-left text-danger deleteId" onClick="deletePodcust()"></i><audio class="deleteId" id="audio" width="220" height="100" controls><source src="'+URL.createObjectURL(files[0])+'" id="src" /></audio>';
                }
                document.getElementById('setPreview').innerHTML=preView;

            }

            document.getElementById("upload").addEventListener("change", handleFiles, false);


            //media  upload
            function protcustUpload(){
                "use strict";
                var formdata = new FormData($("#podcustUpload")[0]);
                var url = $("#podcustUpload").attr("action");
                var method = $("#podcustUpload").attr("method");
                var base_url = $("#base_url").val();
                var url =  base_url+'backend/Podcust/podcustUpload';

                // $("#preloader1").addClass("d-block");
                $("#preloader1").removeClass("d-none");

                alert('ssdsd');

                $.ajax({
                    url: url,
                    type: method,
                    data: formdata, 
                    processData: false,
                    contentType: false,
                   'success': function (data) {

                        if(data==='1'){
                            toastr.success('Upload successful');
                        }else if(data==='2'){
                            toastr.error('Error! - This file already exist');
                        }else{
                            toastr.error('Error! - This file already exist');
                        }

                        $("#readi").load(location.href + " #readi");
                        window.location.href = window.location.href;

                        // $("#preloader1").addClass("d-block");
                        // $("#preloader1").removeClass("d-none");

                    },

                    error: function (xhr, desc, err){
                        toastr.error('Error!');
                        $("#readi").load(location.href + " #readi");
                        window.location.href = window.location.href;
                    }
                });
            }
 


            function sendValue(s){
                "use strict";
                var id = s.split(",")[0];
                var filename = s.split(",")[1];
                var spfile = filename.split(".");
                var base_url = $('#base_url').val();
                var imageLink = $('#imageLink').val();
                if(spfile[1]==='mp4'){
                    var preView = '<i class="fas fa-trash float-left text-danger deleteId" onClick="deletePodcust()"></i><video class="deleteId" width="220" height="150" controls><source src="'+imageLink+'uploads/podcasts/'+filename+'" type="video/mp4"></video>';
                }
                if(spfile[1]==='mp3'){
                    var preView ='<i class="fas fa-trash float-left text-danger deleteId" onClick="deletePodcust()"></i><audio class="deleteId" id="audio" width="300" height="100" controls><source src="'+imageLink+'uploads/podcasts/'+filename+'" id="src" /></audio>';
                }
                window.opener.document.getElementById('podcustPriview').innerHTML=preView;
                window.opener.document.getElementById('lib_podcust_selected').value = id;
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

            function deletePodcust(){
                $('#lib_podcust_selected').attr('value', '');  
                $(".deleteId").remove();
            }


