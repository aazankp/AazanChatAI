$(document).ready(function(){
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    
    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();
    });

    function menuBtnChange() {
        if(sidebar.classList.contains("sidebar")){
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
        }else {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        }
    }
});

$(document).ready(function()
{

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