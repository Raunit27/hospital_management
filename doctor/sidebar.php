<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap');

:root {
    --calendar-bg-color: #dbe5ff;
    --calendar-font-color: #121010;
    --weekdays-border-bottom-color: #404040;
    --calendar-date-hover-color: #505050;
  
    --calendar-today-color: linear-gradient(to bottom, #03a9f4, #2196f3);
    --calendar-today-innerborder-color: transparent;
    --calendar-nextprev-bg-color: transparent;
    --next-prev-arrow-color : #FFF;
    --calendar-border-radius: 20px;
    --calendar-prevnext-date-color: #484848
}

* {
    padding: 0;
    margin: 0;
}

.calendar {
    font-family: 'IBM Plex Sans', sans-serif;
    position: relative;
    
    background: var(--calendar-bg-color);
    color: var(--calendar-font-color);
    margin: 2px auto;
    box-sizing: border-box;
    overflow: hidden;
   
    border-radius: var(--calendar-border-radius);
}

.calendar-inner {
    padding: 10px 10px;
}

.calendar .calendar-inner .calendar-body {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
}


.calendar .calendar-inner .calendar-body div:nth-child(-n+7) {
    border: 1px solid transparent;
    border-bottom: 1px solid var(--weekdays-border-bottom-color);
}

.calendar .calendar-inner .calendar-body div:nth-child(-n+7):hover {
    border: 1px solid transparent;
    border-bottom: 1px solid var(--weekdays-border-bottom-color);
}

.calendar .calendar-inner .calendar-body div>a {
    color: var(--calendar-font-color);
    text-decoration: none;
    display: flex;
    justify-content: center;
}

.calendar .calendar-inner .calendar-body div:hover {
    border: 1px solid var(--calendar-date-hover-color);
    border-radius: 4px;
}

.calendar .calendar-inner .calendar-body div.empty-dates:hover {
    border: 1px solid transparent;
}

.calendar .calendar-inner .calendar-controls {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}

.calendar .calendar-inner .calendar-today-date {
    display: grid;
    text-align: center;
    cursor: pointer;
    margin: 3px 0px;
    background: var(--calendar-current-date-color);
    padding: 8px 0px;
    border-radius: 10px;
    width: 80%;
    margin: auto;
}

.calendar .calendar-inner .calendar-controls .calendar-year-month {
    display: flex;
    min-width: 100px;
    justify-content: space-evenly;
    align-items: center;
}

.calendar .calendar-inner .calendar-controls .calendar-next {
    text-align: right;
}

.calendar .calendar-inner .calendar-controls .calendar-year-month .calendar-year-label,
.calendar .calendar-inner .calendar-controls .calendar-year-month .calendar-month-label {
    font-weight: 500;
    font-size: 15px;
}

.calendar .calendar-inner .calendar-body .calendar-today {
    background: var(--calendar-today-color);
    border-radius: 4px;
}

.calendar .calendar-inner .calendar-body .calendar-today:hover {
    border: 1px solid transparent;
}

.calendar .calendar-inner .calendar-body .calendar-today a {
    outline: 2px solid var(--calendar-today-innerborder-color);
}

.calendar .calendar-inner .calendar-controls .calendar-next a,
.calendar .calendar-inner .calendar-controls .calendar-prev a {
    color: var(--calendar-font-color);
    font-family: arial, consolas, sans-serif;
    font-size: 26px;
    text-decoration: none;
    padding: 4px 12px;
    display: inline-block;
    background: var(--calendar-nextprev-bg-color);
    margin: 10px 0 10px 0;
}

.calendar .calendar-inner .calendar-controls .calendar-next a svg,
.calendar .calendar-inner .calendar-controls .calendar-prev a svg {
    height: 20px;
    width: 20px;
}

.calendar .calendar-inner .calendar-controls .calendar-next a svg path,
.calendar .calendar-inner .calendar-controls .calendar-prev a svg path{
    fill: var(--next-prev-arrow-color);
}

.calendar .calendar-inner .calendar-body .prev-dates,
.calendar .calendar-inner .calendar-body .next-dates {
    color: var(--calendar-prevnext-date-color);
}

.calendar .calendar-inner .calendar-body .prev-dates:hover,
.calendar .calendar-inner .calendar-body .next-dates:hover {
  border: 1px solid transparent;
  pointer-events: none;
}
  </style>
</head>
<body>
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="welcome.php">
      
      <span style="margin-left: 15%; font-weight: bold; color: black;">
        Welcome to Event Up
      </span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Event_Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="event_details.php">
          <i class="bi bi-circle"></i><span>Event Details</span>
        </a>
      </li>
      <li>
        <a href="details_to_client.php">
          <i class="bi bi-circle"></i><span>Provide details to client</span>
        </a>
      </li>
      <li>
        <a href="provided_details.php">
          <i class="bi bi-circle"></i><span>View provided details</span>
        </a>
      </li>
      <!-- <li>
        <a href="components-badges.html">
          <i class="bi bi-circle"></i><span>Check List</span>
        </a>
      </li>
      <li>
        <a href="components-breadcrumbs.html">
          <i class="bi bi-circle"></i><span>Venue</span>
        </a>
      </li> -->
      <!-- <li>
        <a href="components-buttons.html">
          <i class="bi bi-circle"></i><span>Buttons</span>
        </a>
      </li>
      <li>
        <a href="components-cards.html">
          <i class="bi bi-circle"></i><span>Cards</span>
        </a>
      </li>
      <li>
        <a href="components-carousel.html">
          <i class="bi bi-circle"></i><span>Carousel</span>
        </a>
      </li>
      <li>
        <a href="components-list-group.html">
          <i class="bi bi-circle"></i><span>List group</span>
        </a>
      </li>
      <li>
        <a href="components-modal.html">
          <i class="bi bi-circle"></i><span>Modal</span>
        </a>
      </li>
      <li>
        <a href="components-tabs.html">
          <i class="bi bi-circle"></i><span>Tabs</span>
        </a>
      </li>
      <li>
        <a href="components-pagination.html">
          <i class="bi bi-circle"></i><span>Pagination</span>
        </a>
      </li>
      <li>
        <a href="components-progress.html">
          <i class="bi bi-circle"></i><span>Progress</span>
        </a>
      </li>
      <li>
        <a href="components-spinners.html">
          <i class="bi bi-circle"></i><span>Spinners</span>
        </a>
      </li>
      <li>
        <a href="components-tooltips.html">
          <i class="bi bi-circle"></i><span>Tooltips</span>
        </a>
      </li> -->
    </ul>
  </li><!-- End Components Nav -->
    <!-- checklist -->
      
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#checklist" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>CheckList</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="checklist" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="event_checklist.php">
          <i class="bi bi-circle"></i><span>Event Checklist </span>
        </a>
      </li>
      <li>
        <a href="personal_note.php">
          <i class="bi bi-circle"></i><span>Personal Note </span>
        </a>
      </li>
      
    </ul>
  </li> 

     <!-- checklist end -->


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Customer Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="client_information.php">
          <i class="bi bi-circle"></i><span>Information</span>
        </a>
      </li>
      <!-- <li>
        <a href="forms-layouts.html">
          <i class="bi bi-circle"></i><span>Contact</span>
        </a>
      </li> -->
      <li>
        <a href="meet_client.php">
          <i class="bi bi-circle"></i><span>Meeting</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Staff Details</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="staff_information.php
        ">
          <i class="bi bi-circle"></i><span>List of staff</span>
        </a>
      </li>
      <li>
        <a href="view_book_staff.php">
          <i class="bi bi-circle"></i><span>View booked staff</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-heading">Profile</li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-bar-chart"></i><span>Myprofile</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="view_profile.php">
          <i class="bi bi-circle"></i><span>view profile</span>
        </a>
      </li>
      <!-- <li>
        <a href="charts-apexcharts.html">
          <i class="bi bi-circle"></i><span>Customer Budget</span>
        </a>
      </li> -->
      <!-- <li>
        <a href="charts-echarts.html">
          <i class="bi bi-circle"></i><span></span>
        </a>
      </li> -->
    </ul>
  </li><!-- End Charts Nav -->
  <li class="nav-heading">Others</li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Contract & Agreement</span>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <!-- <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span></span>
        </a> -->
      </li>
      <!-- <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span>Remix Icons</span>
        </a>
      </li>
      <li>
        <a href="icons-boxicons.html">
          <i class="bi bi-circle"></i><span>Boxicons</span>
        </a>
      </li> -->
    </ul>
  </li><!-- End Icons Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gem"></i><span>Rating & Feedback</span>
    </a>
   
  </li>

  <div class="calendar" ></div>

  <!-- <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li>End F.A.Q Page Nav

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li>End Contact Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-register.html">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-login.html">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li>End Login Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.html">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li>End Error 404 Page Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li>End Blank Page Nav --> 

</ul>

</aside>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script>
    //check the console for date click event
//Fixed day highlight
//Added previous month and next month view

function CalendarControl() {
    const calendar = new Date();
    const calendarControl = {
      localDate: new Date(),
      prevMonthLastDate: null,
      calWeekDays: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      calMonthName: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec"
      ],
      daysInMonth: function (month, year) {
        return new Date(year, month, 0).getDate();
      },
      firstDay: function () {
        return new Date(calendar.getFullYear(), calendar.getMonth(), 1);
      },
      lastDay: function () {
        return new Date(calendar.getFullYear(), calendar.getMonth() + 1, 0);
      },
      firstDayNumber: function () {
        return calendarControl.firstDay().getDay() + 1;
      },
      lastDayNumber: function () {
        return calendarControl.lastDay().getDay() + 1;
      },
      getPreviousMonthLastDate: function () {
        let lastDate = new Date(
          calendar.getFullYear(),
          calendar.getMonth(),
          0
        ).getDate();
        return lastDate;
      },
      navigateToPreviousMonth: function () {
        calendar.setMonth(calendar.getMonth() - 1);
        calendarControl.attachEventsOnNextPrev();
      },
      navigateToNextMonth: function () {
        calendar.setMonth(calendar.getMonth() + 1);
        calendarControl.attachEventsOnNextPrev();
      },
      navigateToCurrentMonth: function () {
        let currentMonth = calendarControl.localDate.getMonth();
        let currentYear = calendarControl.localDate.getFullYear();
        calendar.setMonth(currentMonth);
        calendar.setYear(currentYear);
        calendarControl.attachEventsOnNextPrev();
      },
      displayYear: function () {
        let yearLabel = document.querySelector(".calendar .calendar-year-label");
        yearLabel.innerHTML = calendar.getFullYear();
      },
      displayMonth: function () {
        let monthLabel = document.querySelector(
          ".calendar .calendar-month-label"
        );
        monthLabel.innerHTML = calendarControl.calMonthName[calendar.getMonth()];
      },
      selectDate: function (e) {
        console.log(
          `${e.target.textContent} ${
            calendarControl.calMonthName[calendar.getMonth()]
          } ${calendar.getFullYear()}`
        );
      },
      plotSelectors: function () {
        document.querySelector(
          ".calendar"
        ).innerHTML += `<div class="calendar-inner"><div class="calendar-controls">
          <div class="calendar-prev"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M88.2 3.8L35.8 56.23 28 64l7.8 7.78 52.4 52.4 9.78-7.76L45.58 64l52.4-52.4z"/></svg></a></div>
          <div class="calendar-year-month">
          <div class="calendar-month-label"></div>
          <div>-</div>
          <div class="calendar-year-label"></div>
          </div>
          <div class="calendar-next"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128"><path fill="#666" d="M38.8 124.2l52.4-52.42L99 64l-7.77-7.78-52.4-52.4-9.8 7.77L81.44 64 29 116.42z"/></svg></a></div>
          </div>
         
          <div class="calendar-body"></div></div>`;
      },
      plotDayNames: function () {
        for (let i = 0; i < calendarControl.calWeekDays.length; i++) {
          document.querySelector(
            ".calendar .calendar-body"
          ).innerHTML += `<div>${calendarControl.calWeekDays[i]}</div>`;
        }
      },
      plotDates: function () {
        document.querySelector(".calendar .calendar-body").innerHTML = "";
        calendarControl.plotDayNames();
        calendarControl.displayMonth();
        calendarControl.displayYear();
        let count = 1;
        let prevDateCount = 0;
  
        calendarControl.prevMonthLastDate = calendarControl.getPreviousMonthLastDate();
        let prevMonthDatesArray = [];
        let calendarDays = calendarControl.daysInMonth(
          calendar.getMonth() + 1,
          calendar.getFullYear()
        );
        // dates of current month
        for (let i = 1; i < calendarDays; i++) {
          if (i < calendarControl.firstDayNumber()) {
            prevDateCount += 1;
            document.querySelector(
              ".calendar .calendar-body"
            ).innerHTML += `<div class="prev-dates"></div>`;
            prevMonthDatesArray.push(calendarControl.prevMonthLastDate--);
          } else {
            document.querySelector(
              ".calendar .calendar-body"
            ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
          }
        }
        //remaining dates after month dates
        for (let j = 0; j < prevDateCount + 1; j++) {
          document.querySelector(
            ".calendar .calendar-body"
          ).innerHTML += `<div class="number-item" data-num=${count}><a class="dateNumber" href="#">${count++}</a></div>`;
        }
        calendarControl.highlightToday();
        calendarControl.plotPrevMonthDates(prevMonthDatesArray);
        calendarControl.plotNextMonthDates();
      },
      attachEvents: function () {
        let prevBtn = document.querySelector(".calendar .calendar-prev a");
        let nextBtn = document.querySelector(".calendar .calendar-next a");
        let todayDate = document.querySelector(".calendar .calendar-today-date");
        let dateNumber = document.querySelectorAll(".calendar .dateNumber");
        prevBtn.addEventListener(
          "click",
          calendarControl.navigateToPreviousMonth
        );
        nextBtn.addEventListener("click", calendarControl.navigateToNextMonth);
        todayDate.addEventListener(
          "click",
          calendarControl.navigateToCurrentMonth
        );
        for (var i = 0; i < dateNumber.length; i++) {
            dateNumber[i].addEventListener(
              "click",
              calendarControl.selectDate,
              false
            );
        }
      },
      highlightToday: function () {
        let currentMonth = calendarControl.localDate.getMonth() + 1;
        let changedMonth = calendar.getMonth() + 1;
        let currentYear = calendarControl.localDate.getFullYear();
        let changedYear = calendar.getFullYear();
        if (
          currentYear === changedYear &&
          currentMonth === changedMonth &&
          document.querySelectorAll(".number-item")
        ) {
          document
            .querySelectorAll(".number-item")
            [calendar.getDate() - 1].classList.add("calendar-today");
        }
      },
      plotPrevMonthDates: function(dates){
        dates.reverse();
        for(let i=0;i<dates.length;i++) {
            if(document.querySelectorAll(".prev-dates")) {
                document.querySelectorAll(".prev-dates")[i].textContent = dates[i];
            }
        }
      },
      plotNextMonthDates: function(){
       let childElemCount = document.querySelector('.calendar-body').childElementCount;
       //7 lines
       if(childElemCount > 42 ) {
           let diff = 49 - childElemCount;
           calendarControl.loopThroughNextDays(diff);
       }

       //6 lines
       if(childElemCount > 35 && childElemCount <= 42 ) {
        let diff = 42 - childElemCount;
        calendarControl.loopThroughNextDays(42 - childElemCount);
       }

      },
      loopThroughNextDays: function(count) {
        if(count > 0) {
            for(let i=1;i<=count;i++) {
                document.querySelector('.calendar-body').innerHTML += `<div class="next-dates">${i}</div>`;
            }
        }
      },
      attachEventsOnNextPrev: function () {
        calendarControl.plotDates();
        calendarControl.attachEvents();
      },
      init: function () {
        calendarControl.plotSelectors();
        calendarControl.plotDates();
        calendarControl.attachEvents();
      }
    };
    calendarControl.init();
  }
  
  const calendarControl = new CalendarControl();

  </script>
  
</body>
</html>