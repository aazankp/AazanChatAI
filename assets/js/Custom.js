$(document).ready(function(){

    $(document).on("submit", "#QuestionForm", function(event){
        event.preventDefault();
        let Question = $('#Question').val();

        if($.trim(Question) == ''){
            alert('Something Went Wrong');
            return false;
        }
        
        $.ajax({
            url: 'vendor/Proccess.php',
            type: 'POST',
            data: {Question:Question},
            success:function(data)
            {

                $("#mainContent").append(data);
                
                // var textarea = $('.card-body');

                // textarea.css({
                //     'line-height': '1.1',
                //     'width': '100%',
                //     'resize': 'none',
                //     'overflow-y': 'hidden',
                //     'border': 'none'
                // });

                // textarea.css('height', 'auto');
                // textarea.css('height', (textarea[0].scrollHeight) + 'px');

                // test = data.split("```");

                // $.each(test, function(index, value) {

                //     console.log(value);
                //     if (index == 0) {
                //         html = '<p class="myText">'+value+'</p>';
                //         $("#mainContent").append(html);
                //     }

                //     if (index == 1) {
                //         html = '<pre class="myText" style="background: black; color: white; padding: 15px; border-radius: 10px;">'+value+'</pre>';
                //         $("#mainContent").append(html);
                //     }

                //     if (index == 2) {
                //         html = '<p class="myText">'+value+'</p>';
                //         $("#mainContent").append(html);
                //     }

                // });

                console.log(data);


                // jsonObject = JSON.parse(data);

                // jsonText1 = jsonObject.text1.replace(/\\n/g, '');
                // jsonCode = jsonObject.code.replace(/\\n/g, '');
                // jsonText2 = jsonObject.text2.replace(/\\n/g, '');

                // $("#text1").text(jsonText1);
                // $("#code").html(jsonCode);
                // $("#text2").text(jsonText2);

                // console.log(jsonObject);
                // Arr = jsonData.array;
                // console.log(Arr);

                // div = $(".myText:gt(-5)");
                // div.each(function() {
                //     console.log($(this).text());
                // });
                // console.log(div);
            }
        }); // ajax end
    });

    $(document).on("submit", "#logindata", function(event){
        event.preventDefault();
        var formdata = new FormData(this);
        
        $.ajax({
            url: '../vendor/Proccess.php?action=login',
            type: "POST",
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
            success:function(data)
            {
                if (data == 1)
                {
                    window.location.href = "../index.php";
                }
            }
        }); // ajax end
    });

    $(document).on("submit", "#signupdata", function(event){
        event.preventDefault();
        var formdata = new FormData(this);
        
        $.ajax({
            url: '../vendor/Proccess.php?action=signup',
            type: "POST",
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
            success:function(data)
            {
                console.log(data);
                if(data == "error"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password Not Matched!',
                      })
                }
                if(data == "pic"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Choose Picture!',
                      })
                }
                if (data == 1) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Data has been Submitted.',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                if(data == 0){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Server Issue!',
                      })
                }
            }
        }); // ajax end
    });

    $(document).on("click", "#newChat", function(){
        alert("ok");
        $.ajax({
            url: "vendor/Proccess.php?action=newChat",
            type: "POST",
            data: { action: "newChat" },
            success:function(data)
            {
                console.log(data);
            }
        });
    });

    // $("#Question").on('input', function() {
    //     this.style.height = 'auto';
    //     this.style.height = (this.scrollHeight) + 'px';
    //     var test = this.style.height;
    //     // alert(test);
    // });

});

//     $('#submit').on('submit', function(event)
//     {
//         event.preventDefault();
//         let Question = $('#Question').val();

//         if($.trim(Question) == ''){
//             alert('Something Went Wrong');
//             return false;
//         }
        
//         $.ajax({
//             url: '../../vendor/Process.php',
//             type: 'POST',
//             data: {Question:Question},
//             success:function(data)
//             {
//                 console.log(data);
//             }
//         });
//     });
// });