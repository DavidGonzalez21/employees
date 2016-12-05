@include('headers.header')
<<<<<<< HEAD

<script type="text/javascript">
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
              data.push('{id:' + id + ', title:' + title + ', url:' +url + ', class: "event_important", start:'+start.getTime()+ ', end: '+end.getTime()+'}');
              if (!when) {
                when = event.start.date;
              }
              
              
            }
            appendPre(data)
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
      
        
        function add_event(){
            var event = {
          'summary': 'Google I/O 2015',
          'location': '800 Howard St., San Francisco, CA 94103',
          'description': 'A chance to hear more about Google\'s developer products.',
          'start': {
            'dateTime': '2016-12-05T11:05:30-06:00',
            'timeZone': 'America/Monterrey'
          },
          'end': {
            'dateTime': '2016-12-05T11:05:55-06:00',
            'timeZone': 'America/Monterrey'
          },
          'recurrence': [
            'RRULE:FREQ=DAILY;COUNT=2'
          ],
          'attendees': [
            {'email': 'weerogoonzaleez@gmail.com'},
            {'email': 'vbgargciag@gmail.com'}
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
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
        </div>
    </div>
    <div class="calendar">
        
    </div>
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
        <b>start</b><input type="text" name="start" id="start"><br>
        <b>end</b><input type="text" name="end" id="end"><br>
        <b>attendees</b><input type="text" name="attendees" id="attendees">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    $('.addEvent').click(function(){
        
        //add_event(data);
    })
</script>

=======
@include('content.head_container')

<div class="">
    <h1>here</h1>
</div>

@include('content.footer_container')
>>>>>>> 5bfd02f4227b4658dda8b339d36c56a95627f4ff
@include('headers.footer')
