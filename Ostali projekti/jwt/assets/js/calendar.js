$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
        left:'prev,next today',
        center:'title',
        right:'edit'
        },
        events: 'models/load.php',
        selectable:true,
        selectHelper:true,
        select: function(start)
             {
              var title = prompt("Enter Event Title");
              if(title)
              {
               var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
               $.ajax({
                url:"models/insert.php",
                type:"POST",
                data:{title:title, start:start},
                success:function(podaci)
                {
                    alert("You have successfully scheduled the event!");
                    window.location.href="index.php?page=schedule";
                }
               })
              }
             },
    });

    $(".brisanje").click(function(){
        let id = $(this).attr("data-id");

        $.ajax({
            url: "models/delete.php",
            method: "get",
            dataType: 'json',
            data:{
                id: id
            },
            success: function(data){
                window.location.href = "index.php?page=schedule"
            },
            error: function(xhr){
                console.log(xhr);
            }
         });
    });

    $(".update").click(function(){
        let id = $(this).attr("data-id");

        $.ajax({
            url: "models/single.php",
            method: "get",
            dataType: "json",
            data:{
                id: id
            },
            success: function(data){
                popuniVrednosti(data);
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    });

    function refresh(){
        $.ajax({
            url: "models/loda.php",
            method: "get",
            dataType: "json",
            success: function(data){
                ispisiProizvode(data);
            },
            error: function(xhr, status, responseText){
                console.log(xhr);
            }
        });
    }

    function popuniVrednosti(data){
        $("#hdnIdProdChange").val(data.id);
        $("#title").val(data.title);
        $("#start_event").val(data.date);
    }

    function ispisiProizvode(proizvodi){
        let prod = '', count =  1;
        for(let proizvod of proizvodi){
            prod += ispisiProizvod(proizvod, count);
            count++;
        }
        $("#ispis").html(prod);
    }
    
    function ispisiProizvod(proizvod){
        return `<tr>
        <td>${proizvod.title}</td>
        <td>${proizvod.start_event}</td>
        <td><a href="" data-id="${proizvod.id}">Edit</a></td>
        <td><a href="" class="brisanje" data-id="${proizvod.id}">Delete</a></td>
    </tr>`;
    }

})
//      events: 'load.php',
//      selectable:true,
//      selectHelper:true,
//      select: function(start, end, allDay)
//      {
//       var title = prompt("Enter Event Title");
//       if(title)
//       {
//        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
//        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
//        $.ajax({
//         url:"../../models/insert.php",
//         type:"POST",
//         data:{title:title, start:start, end:end},
//         success:function()
//         {
//          calendar.fullCalendar('refetchEvents');
//          alert("Added Successfully");
//         }
//        })
//       }
//      },
//      editable:true,
//      eventResize:function(event)
//      {
//       var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
//       var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
//       var title = event.title;
//       var id = event.id;
//       $.ajax({
//        url:"../../models/update.php",
//        type:"POST",
//        data:{title:title, start:start, end:end, id:id},
//        success:function(){
//         calendar.fullCalendar('refetchEvents');
//         alert('Event Update');
//        }
//       })
//      },
 
//      eventDrop:function(event)
//      {
//       var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
//       var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
//       var title = event.title;
//       var id = event.id;
//       $.ajax({
//        url:"models/update.php",
//        type:"POST",
//        data:{title:title, start:start, end:end, id:id},
//        success:function()
//        {
//         calendar.fullCalendar('refetchEvents');
//         alert("Event Updated");
//        }
//       });
//      },
 
//      eventClick:function(event)
//      {
//       if(confirm("Are you sure you want to remove it?"))
//       {
//        var id = event.id;
//        $.ajax({
//         url:"models/delete.php",
//         type:"POST",
//         data:{id:id},
//         success:function()
//         {
//          calendar.fullCalendar('refetchEvents');
//          alert("Event Removed");
//         }
//        })
//       }
//      },
 
//     });
//    });