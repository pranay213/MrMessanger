$(document).ready(function(){

    jQuery(window).bind(
        "beforeunload", 
        function() { 
            $.ajax({
                url:'offline.php',
                success:function(data)
                {
                    
                }
            })
        }
    )

    $(document).on('click','.user_id',function()
    { var id=$(this).data('id');
    $('.active-name').html('');
    $.ajax({
        url:'box.php',
        success:function(data)
        {
            $('.msg-box').html(data);
        }
    })
       $('.you').html(id);
       $.ajax({
           url:'p.php',
           type:'post',
           data:{id:id},
           success:function(data)
           { menu=` <i class="fas fa-arrow-left"></i>
           <p class="active active-name">Pranay</p>
           <i class="fa fa-tools"></i>
           </div>`;
               $('abc').html(data);
               $('.search-1').html("");

               $('.menu').html(menu);
              
              $.ajax({
                  url:'name.php',
                  type:'post',
                  data:{id:id},
                  success:function(data)
                  {
                    $('.active-name').html(data
                        );
                  }
              })
              down();
             
              setInterval(messsge,1000)
             
             
                

           

           }
       })
      
       

    })
    $(document).on('click','.fa-tools',function()
    {   submenu=`<p    style="font-size:20px" id="log-out" >Logout</p>
    <p style="font-size:20px" id="settings"  >ProfileSettings</p>`;
        $(this).replaceWith(submenu)
        clearInterval(messsge)
    })
    $(document).on('click','.fa-arrow-left',function()
    {
        $.ajax({
            url:'m.php',
            type:'post',
            success:function(data)
            {
                window.location="m.php";
            }
        })
        clearInterval(messsge)
    })
    $(document).on('click','#log-out',function(){
       
        $.ajax({
            url:'log-out.php',
            type:'post',
            success:function(data){
                if(data==1)
                {
                    window.location="signin.php";
                }
            }

        })

    })
    $(document).on('click','.add-user',function()
    {
        
        menu=` <i class="fas fa-arrow-left"></i>
           <p class="active active-name">Add User</p>
           <i class="fa fa-tools"></i>
           </div>`;
        add_user=`<form action="add-user.php" method="post"><p>Add Number Here</p> <div class="form-group">
        <input type="text"name='user_number'class="form-control" required>
       
       </div>
       <br>
       <div class="form-group">
           <input type="submit" class='btn  btn-outline-success btn-block' value="ADD">
       </div>
       </form>
       
       
       `;
       $('.h-1').html('');
              
       $('.h-1').html(add_user);


               $('.search-1').html("");

               $('.menu').html(menu);
               clearInterval(messsge)
    })
    // $(document).on("click",'.fa-paper-plane',function(e)
    // {   
       
    //     e.preventDefault();
    //     var msg=$('.msg-1').val();
       
    //     if(msg!='')
    //     {

    //    $.ajax({
    //        url:'insert-msg.php',
    //        type:'post',
    //        data:{msg:msg},
    //        success:function(data)
    //        {
    //         $('.msg-1').val('');
    //         messsge();
               
    //        }
    //    })
    // }
        
    // })

    $(document).on("click",'.fa-paper-plane',function(e)
    {    height();
       
        e.preventDefault();
        var msg=$('.msg-1').val();
       
        if(msg!='')
        {

       $.ajax({
           url:'insert-msg.php',
           type:'post',
           data:{msg:msg},
           success:function(data)
           {
               
            $('.msg-1').val('');
            messsge();
            down();
           
           
            
                    

          
           
           
               
           }
       })
    }
        
    })
   

})
function messsge()
{  var id=$('.you').html();
    $.ajax({
        url:'p.php',
        type:'post',
        data:{id:id},
        success:function(data)
        { menu=` <i class="fas fa-arrow-left"></i>
        <p class="active">Pranay</p>
        <i class="fa fa-tools"></i>
        </div>`;
            $('.h-1').html(data);
           
        

        }
        
})

}
$(document).on("click",'#settings',function()
{ clearInterval(messsge)
    $.ajax({
        url:'settings.php',
        success:function(data)
        {
            $('.card-body').html(data);
            
        }
       
    })


})
function down()
{
var height =10000000;
$('.h-1 ').each(function(i, value){
    height += parseInt($(this).height());
});

height += '';

$('.card-body').animate({scrollTop: height});
}
$(document).on('scroll','.card-body',function()
{
   down();
})
function height()
{
    divElement = document.querySelector(".h-1"); 
      
elemHeight = divElement.offsetHeight; 

}
$(document).on('click','.chat-body',function()
{
    clearInterval(messsge);
    clearInterval(down)
})
$(window).bind('mousewheel', function(event) {
    if (event.originalEvent.wheelDelta >= 0) {
        console.log('Scroll up');
        clearInterval(down);
        clearInterval(messsge);

    }
    else {
        console.log('Scroll down');
        clearInterval(down);
        clearInterval(messsge);
    }
});

function myLoading()
{
    setInterval(updatTime,1000)
}
function updatTime()
{
    
    $.ajax(
    {
        url:'time.php',
        success:function(data)
        {
            $('time').html(time);
        }
    })
}

