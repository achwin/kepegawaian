<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">

html {
  background-color: #594c4a;
}

body {
  font-family: "Chivo Regular", "Franklin Gothic Medium", "Franklin Gothic", "ITC Franklin Gothic", Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  width: 95.5078125%;
  margin: 0 auto;
  width: 90%;
}

.main {
  padding: 4px 0;
  width: 508px;
  height: 348px;
  background-color: #f5f5f5;
  margin: 100px auto;
  -webkit-box-shadow: 0px 10px 10px rgba(47, 40, 39, 0.9), 0px 35px 20px rgba(47, 40, 39, 0.4), 0px 50px 15px rgba(69, 57, 62, 0.6); // + clean up with a mixin
}

.nav {
  float: left;
  width: 215px;
  ul {
    padding: 0;
    margin: 0;
    list-style: none;
  }
  li {
    padding: 30px 0 0 95px;
    height: 84px;
    border-bottom: 1px solid rgba(193, 193, 193, 0.5);
    font-size: 25px;
    color: rgba(188, 185, 184, 0.7);
    &:hover {
      color: #E0744D;
    }
  }
  .al {
    background: url('http://www.charlesamoss.com/design/images/clock_wid/alams.svg') 15% center no-repeat;
  }
  .sw {
    background: url('http://www.charlesamoss.com/design/images/clock_wid/stopwatch.svg') 15% center no-repeat;
  }
  .tm {
    background: url('http://www.charlesamoss.com/design/images/clock_wid/timer.svg') 15% center no-repeat;
  }
  .st {
    background: url('http://www.charlesamoss.com/design/images/clock_wid/site.svg') 15% center no-repeat;
    border-bottom: 0px;
  }
}

#clock {
  padding: 0;
  position: relative;
  list-style: none;
  margin: -50px 10px 0 0;
  height: 234px;
  width: 234px;
  display: block;
  float: right;
  background: url('http://www.charlesamoss.com/design/images/clock_wid/clockFace.svg') 5% center no-repeat;
  /*  -webkit-box-shadow: 0px 0px 20px rgba(47, 40, 39, 0.4);  */
}

#sec,
#min,
#hour {
  position: absolute;
  width: 24px;
  height: 234px;
  top: 0px;
  left: 102px;
}

#sec {
  background: url('http://www.charlesamoss.com/design/images/clock_wid/sec.svg');
  z-index: 3;
}

#min {
  background: url('http://www.charlesamoss.com/design/images/clock_wid/min.svg');
  z-index: 2;
}

#hour {
  background: url('http://www.charlesamoss.com/design/images/clock_wid/hour.svg');
  z-index: 1;
}

#date {
  float: right;
  padding: 0 40px 40px 0;
  #monthDay {
    display: block;
    font-size: 60px;
  }
  #year {
    margin: 8px 0 0 55px;
    display: block;
    text-height: 50%;
    font-size: 36px;
    color: rgba(188, 185, 184, 0.7);
  }
}
  </style>
</head>
<body>
  <!--
  dribbble rebound of MVben's design http://dribbble.com/shots/1145537-Plug-In1
  -->


  <div class="main">
    <div class="nav">
      <ul>
        <li class="al">Alarms</li>
        <li class="sw">Stopwatch</li>
        <li class="tm">Timer</li>
        <li class="st">Site</li>
      </ul>
    </div>

    <ul id="clock">
      <li id="hour"></li>
      <li id="min"></li>
      <li id="sec"></li>
    </ul>

    <div id="date">
      <span id="monthDay"></span>
      <span id="year"></span>
    </div>
  </div>
</body>
<script type="text/javascript">
  // Clock Widget's date and time

const months = ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"]

const now = new Date()

$('#monthDay').append(`${months[now.getMonth()]} ${now.getDate()}`);

$('#year').append(`${now.getFullYear()}`);

// Clock Widget's Rotation
$(function() {

      setInterval( function() {
      var seconds = new Date().getSeconds();
      var sdegree = seconds * 6;
      var srotate = "rotate(" + sdegree + "deg)";

      $("#sec").css({ "transform": srotate });

      }, 1000 );

      setInterval( function() {
      var hours = new Date().getHours();
      var mins = new Date().getMinutes();
      var hdegree = hours * 30 + (mins / 2);
      var hrotate = "rotate(" + hdegree + "deg)";

      $("#hour").css({ "transform": hrotate});

      }, 1000 );

      setInterval( function() {
      var mins = new Date().getMinutes();
      var mdegree = mins * 6;
      var mrotate = "rotate(" + mdegree + "deg)";

      $("#min").css({ "transform" : mrotate });

      }, 1000 );

});
</script>
</html>