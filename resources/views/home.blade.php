@include('headers.header')
@include('content.head_container')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="http://underscorejs.org/underscore-min.js"></script>
<script src="/js/jquery.elastic.js"></script>
<script src="/js/jquery.events.inputs.js"></script>
<script type="text/javascript" src="/js/mention.js"></script>
<link rel="stylesheet" type="text/css" href="/css/mention.css">
<link rel="stylesheet" type="text/css" href="/css/datepicker-style.css">
<style type="text/css">
    td.highlight{
        background-color: red !important;
    }
    td.highlight a{
        color: white;
    }
</style>
<script type="text/javascript">
var dates = [];
      // Your Client ID can be retrieved from your project in the Google
      // Developer Console, https://console.developers.google.com
      var CLIENT_ID = '615292256409-cgnja4nkevjnl20ght17toaom424f00a.apps.googleusercontent.com';


      var SCOPES = ["https://www.googleapis.com/auth/calendar"];

      /**
       * Check if current user has authorized this application.
       */
      function checkAuth() {
        gapi.auth.authorize(
          {
            'client_id': CLIENT_ID,
            'scope': SCOPES.join(' '),
            'immediate': true
          }, handleAuthResult);
      }

      /**
       * Handle response from authorization server.
       *
       * @param {Object} authResult Authorization result.
       */
      function handleAuthResult(authResult) {
        var authorizeDiv = document.getElementById('authorize-div');
        if (authResult && !authResult.error) {
          // Hide auth UI, then load client library.
          authorizeDiv.style.display = 'none';
          loadCalendarApi();
        } else {
          // Show auth UI, allowing the user to initiate authorization by
          // clicking authorize button.
          authorizeDiv.style.display = 'inline';
        }
      }

      /**
       * Initiate auth flow in response to user clicking authorize button.
       *
       * @param {Event} event Button click event.
       */
      function handleAuthClick(event) {
        gapi.auth.authorize(
          {client_id: CLIENT_ID, scope: SCOPES, immediate: false},
          handleAuthResult);
        return false;
      }

      /**
       * Load Google Calendar client library. List upcoming events
       * once client library is loaded.
       */
      function loadCalendarApi() {
        gapi.client.load('calendar', 'v3', listUpcomingEvents);
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */
      function listUpcomingEvents() {
        var request = gapi.client.calendar.events.list({
          'calendarId': 'primary',
          'timeMin': (new Date()).toISOString(),
          'showDeleted': false,
          'singleEvents': true,
          'maxResults': 10,
          'orderBy': 'startTime'
        });

        request.execute(function(resp) {
          var events = resp.items;

          appendPre('Upcoming events:');
          var data = [];
          if (events.length > 0) {
            for (i = 0; i < events.length; i++) {

              var event = events[i];
              var id = event.id;
              var title = event.summary;
              var start = new Date(event.start.dateTime);
              var end = new Date(event.end.dateTime);
              var url = event.htmlLink;
              var when = event.start.dateTime;
              dates.push(start);
              data.push('{id:' + id + ', title:' + title + ', url:' +url + ', class: "event_important", start:'+start+ ', end: '+end+'}');
              if (!when) {
                when = event.start.date;
              }


            }
            appendPre(data)
            calendarize(data)
          } else {
            appendPre('No upcoming events found.');
          }

        });
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('output');

        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);



      }


        function add_event(summary, location, description, start, end, attendees){
            var event = {
          'summary': summary,
          'location': location,
          'description': description,
          'start': {
            'dateTime': start,
            'timeZone': 'America/Monterrey'
          },
          'end': {
            'dateTime': end,
            'timeZone': 'America/Monterrey'
          },
          'recurrence': [
            'RRULE:FREQ=DAILY;COUNT=2'
          ],
          'attendees': [
                attendees
            /*{'email': 'weerogoonzaleez@gmail.com'},
            {'email': 'vbgargciag@gmail.com'}*/
          ],
          'reminders': {
            'useDefault': false,
            'overrides': [
              {'method': 'email', 'minutes': 24 * 60},
              {'method': 'popup', 'minutes': 10}
            ]
          }
        };

        var request = gapi.client.calendar.events.insert({
          'calendarId': 'primary',
          'resource': event
        });

        request.execute(function(event) {
            console.log(event);
          appendPre('Event created: ' + event.htmlLink);
        });
        }




    </script>
    <script src="https://apis.google.com/js/client.js?onload=checkAuth">
    </script>


            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @foreach ($employees as $employee)
                        <h1>{{ $employee->first_name }}</h1>
                    @endforeach
                </div>
                <div id="authorize-div" style="display: none">
      <span>Authorize access to Google Calendar API</span>
      <!--Button for the user to click to initiate auth sequence -->
      <button id="authorize-button" onclick="handleAuthClick(event)">
        Authorize
      </button>

    </div>

    <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Add</button>
    <pre id="output"></pre>
            </div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new event</h4>
      </div>
      <div class="modal-body">
         <div class="form-group">
            <b>tittle</b> <input type="text" name="summary" class="form-control" id="summary">
         </div>
         <div class="form-group">
            <b>location</b> <input type="text" name="location" clasS="form-control" id="location">
         </div>
         <div class="form-group">
            <b>description</b> <input type="text" class="form-control" name="description" id="description"><br>
         </div>
         <div class="form-group">
            <b>start</b><input type="text" class="form-control" name="start" id="start"><br>
         </div>
         <div class="form-group">
        <b>end</b><input type="text" class="form-control" name="end" id="end"><br>
         </div>
        <b>attendees</b><textarea class="mention form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn addEvent">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<div id="datepicker"></div>

<script type="text/javascript">
   (function ($) {


    $('textarea.mention').mentionsInput({
        onDataRequest:function (mode, query, callback) {
            var data = [];
            @foreach ($employees as $employee)
                var id = "{{$employee->user_id}}"
                var name = "{{$employee->email}}"
                var avatar = "{{$employee->profile_photo}}"
                var type = "employee"
                data.push({"id": id,"name": name, "avatar":avatar, "type": type});
            @endforeach

      data = _.filter(data, function(item) { return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1 });

      callback.call(this, data);
    }
    })
     $('.get-syntax-text').click(function() {
    $('textarea.mention').mentionsInput('val', function(text) {
      alert(text);
    });
  });

  $('.get-mentions').click(function() {
    $('textarea.mention').mentionsInput('getMentions', function(data) {
      alert(JSON.stringify(data));
    });
  });
})(jQuery);

function calendarize(data){

        $('#datepicker').datepicker({
            inline: false,
            numberOfMonths: [1,12],
            dateFormat: "mm/dd/yyyy",
            beforeShowDay: highlightDays

    });
    }


     function highlightDays(date){

            for (var i = 0; i < dates.length; i++) {
                if (new Date(dates[i]).toLocaleDateString() == date.toLocaleDateString()) {
                    console.log('entro', new Date(dates[i]).toString())
                    return [true, 'highlight'];
                }
                else{
                    //console.log('no entro', new Date(dates[i]).toString())
                }
            }
            return [true, ''];
        }

$(document).ready(function(){

    $('.addEvent').click(function(){
        var summary = $('#summary').val();
        var location = $('#location').val();
        var description = $('#description').val();
        var a = $('#start').val();
        var time = new Date(a);
        var start = time.toISOString();
        var a2 = $('#end').val();
        var time2 = new Date(a2)
        var end = time2.toISOString();
        var str = $('.mentions-input-box .mentions').text();
        var res = str.split(" ");
        var attendees = [];
        res.forEach(function(value,key){
            attendees.push({"email":value});
        })
        console.log(attendees);
        add_event(summary, location, description, start, end, attendees)
        //add_event(data);
    })
})

</script>

@include('content.footer_container')
@include('headers.footer')
