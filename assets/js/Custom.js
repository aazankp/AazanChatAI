$(document).ready(function(){

    let form = document.querySelector('#QuestionForm');
    if(form != null) {
        form.addEventListener('submit', function(){
            var formElement = $("form");
            var formId = formElement.attr("id");
            if(formId == ''){
                alert('Please Reload Page!');
            }
        });
    }
    
    $(document).on("submit", "#QuestionForm", function(event){
        event.preventDefault();
        let Question = $('#Question').val();
        let NewChatId = $('#newChat').val();

        if($.trim(Question) == ''){
            alert('Something Went Wrong Please Reload Page!');
            return false;
        
        }
        
        $.ajax({
            url: 'vendor/Proccess.php',
            type: 'POST',
            data: {
                Question:Question,
                NewChatId:NewChatId
            },
            success:function(data)
            {
                $("#mainContent").html(data);
            }
        }); // ajax end

        $.ajax({
            url: 'vendor/Proccess.php?action=liHistory',
            type: "POST",
            success:function(data)
            {
                arr = JSON.parse(data);
                $("#liHistory").html(arr.liCode);
                $("#newChat").val(arr.newChatId);
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
                console.log(data);
                if (data == 1)
                {
                    window.location.href = "../index.php";
                }
                if(data == "error"){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password or Email is Incorrect!',
                      })
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
        let NewChatId = $('#newChat').val();
        $.ajax({
            url: "vendor/Proccess.php?action=newChat",
            type: "POST",
            data: { 
                action:"newChat",
                NewChatId:NewChatId
            },
            success:function(data)
            {
                $("#mainContent").html(data);
            }
        });
    });

    // $("#Question").on('input', function() {
    //     this.style.height = 'auto';
    //     this.style.height = (this.scrollHeight) + 'px';
    //     var test = this.style.height;
    //     // alert(test);
    // });

    $(document).on("click", ".ChatID", function(){
        chatId = $(this).val();
        $.ajax({
            url: 'vendor/Proccess.php?action=chatFetch',
            type: "POST",
            data: { chatId:chatId },
            success:function(data)
            {
                $("#mainContent").html(data);
            }
        }); // ajax end
    });


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