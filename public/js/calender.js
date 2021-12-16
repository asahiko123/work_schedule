
document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {

      views: {
        timeGridWeek: {
          titleFormat: function (date) {
            const startMonth = date.start.month + 1;
            const endMonth = date.end.month + 1;
      
            // 1週間のうちに月をまたぐかどうかの分岐処理
            if (startMonth === endMonth) {
               return startMonth + '月';
            } else {
               return startMonth + '月～' + endMonth + '月'; 
            }
          },
          dayHeaderFormat: function (date) {
            const day = date.date.day;
            const weekNum = date.date.marker.getDay();
            const week = ['(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)'][weekNum];
      
            return day + ' ' + week;
          }
        }
      },
      height: '100%',
      expandRows: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      locale:'ja',
      dayMaxEvents: true, // allow "more" link when too many events
      dayMaxEvents: 2, 
      buttonText: {
        today: '今月',
        month: '月',
        week:'週',
        day:'日',
        list: '予定'
      },
      dayCellContent: function (e) {
        e.dayNumberText = e.dayNumberText.replace('日', '');
      },
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      },
      events:'../json-events.json',
     
      selectable: true,
      select: function(info){
        document.location.href="/schedule/create";
      },
      contentHeight:'auto',
      selectLongPressDelay:0,
      eventClick: function(info) {
        var event_id = info.event.id;
        const event_name =info.event.title;
        const event_start=info.event.start;

        const dateformat = (event_start)=>{
          let formattedDate =event_start.getFullYear()+"-"+(event_start.getMonth()+1)+"-"+event_start.getDate()
          return formattedDate;
        }

        console.log(event_name);

        document.getElementById('id').value=info.event.id;

        $('#exampleModalLabel').html(`${event_name}さんの${dateformat(event_start)}の予定を変更または削除します。`); // モーダルのタイトルをセット
        $('#modalBody').html(''); // モーダルの本文をセット
        $('#exampleModal').modal(); // モーダル着火
      },
      eventDrop:function(info){
          //eventをドロップした時の処理
        //addEvent(calender,info);
      }
    });

    $('#delete-task').on('click',function(){
      var form = document.getElementById('delete-task-form');
      var delete_id = document.getElementById('id').value;
      console.log(delete_id);
      form.elements['id'].value =delete_id;
      form.submit();
    });

    calendar.render();

  });





