<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
<meta charset="UTF-8">
<title>Ultimate Dice Simulation</title>
<link href="jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" href="dice_svg.css" media="screen, projection" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery.cookie.js"></script>
</head>
<body>
<main>
<section>
<header><h1>Ultimate Dice Simulation</h1></header>
<article>
<h2>Roll the Dice</h2>
<p>Your current dice roll:</p>
<p id="roll_info" class="warning">&nbsp;&nbsp;-- No dice roll yet --</p>
<div id='roll_result'>
</div> <!-- end of 'roll_result' -->
<div id="form_tabs">
  <ul>
    <li><a href="#tabs-1">Pulldown Menus</a></li>
    <li><a href="#tabs-2">Shorthand</a></li>
    <li><a href="#tabs-3">Die Size</a></li>
    <li><a href="#tabs-4">Custom Dice</a></li>
  </ul>
  <div id="tabs-1">
    <form id="dice_form" action="javascript:void(0);">
    Roll (limit 20):&nbsp;
    <input type="text" name="number" size="2" maxlength="2" onfocus="this.value='';" value="2" />&nbsp;
    dice, base type:&nbsp;
    <select name="dicetype" id="dicetype">
    </select>
    with the face type:&nbsp;
    <select name="diceface" id="diceface">
    </select>.<br />
    How many re-rolls after initial roll:
    <input type="text" name="reroll" size="2" maxlength="2" onfocus="this.value='';" value="0" /><br />
    <input type="submit" value="Roll the dice!" />
    </form>
  </div>
  <div id="tabs-2">
    <form id="dshort_form" action="javascript:void(0);">
      Enter a shorthand definition for the dice to roll:&nbsp;&nbsp;
      <input type="text" name="dshort" size="15" value="2d6pips" /><br />
      How many re-rolls after initial roll:&nbsp;&nbsp;
      <input type="text" name="dsreroll" size="2" maxlength="2" onfocus="this.value='';" value="0" /><br />
      <input type="submit" value="Roll the Dice!" />
    </form>
  </div>
  <div id="tabs-3">
    <div id="die_sizer"><div id="sizer-handle" class="ui-slider-handle"></div></div>
  </div>
  <div id="tabs-4">
    <div id="your_store">
      <p>
        Each storage slot allows you to save a shorthand definition of dice (orange box) to be rolled.
        The number of re-rolls (blue box) is also saved.
        You may cut and paste definitions from the Shorthand tab or the debug area below the Help button, ensuring that you get the results you want.
      </p>
      <form id="your_dice" action="javascript:void(0);">
        <input type="text" name="store01" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll01" size="2" class="blue" />&nbsp;&nbsp;<button id="save01">Save</button>&nbsp;&nbsp;<button id="roll01">Roll</button><br />
        <input type="text" name="store02" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll02" size="2" class="blue" />&nbsp;&nbsp;<button id="save02">Save</button>&nbsp;&nbsp;<button id="roll02">Roll</button><br />
        <input type="text" name="store03" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll03" size="2" class="blue" />&nbsp;&nbsp;<button id="save03">Save</button>&nbsp;&nbsp;<button id="roll03">Roll</button><br />
        <input type="text" name="store04" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll04" size="2" class="blue" />&nbsp;&nbsp;<button id="save04">Save</button>&nbsp;&nbsp;<button id="roll04">Roll</button><br />
        <input type="text" name="store05" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll05" size="2" class="blue" />&nbsp;&nbsp;<button id="save05">Save</button>&nbsp;&nbsp;<button id="roll05">Roll</button><br />
        <input type="text" name="store06" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll06" size="2" class="blue" />&nbsp;&nbsp;<button id="save06">Save</button>&nbsp;&nbsp;<button id="roll06">Roll</button><br />
        <input type="text" name="store07" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll07" size="2" class="blue" />&nbsp;&nbsp;<button id="save07">Save</button>&nbsp;&nbsp;<button id="roll07">Roll</button><br />
        <input type="text" name="store08" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll08" size="2" class="blue" />&nbsp;&nbsp;<button id="save08">Save</button>&nbsp;&nbsp;<button id="roll08">Roll</button><br />
        <input type="text" name="store09" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll09" size="2" class="blue" />&nbsp;&nbsp;<button id="save09">Save</button>&nbsp;&nbsp;<button id="roll09">Roll</button><br />
        <input type="text" name="store10" size="12" class="orange" />&nbsp;&nbsp;<input type="text" name="reroll10" size="2" class="blue" />&nbsp;&nbsp;<button id="save10">Save</button>&nbsp;&nbsp;<button id="roll10">Roll</button><br />
      </form>
    </div>
  </div>
</div>
<br>
<hr class="fancyHR">
<button id="help">Help</button>
<div id="help_dialog" title="Help: Dice Available">
  <p>Here are the dice that are available for selection. Notice that the Shorthand notation is shown for each dice type.</p>
  <hr class="fancyHR">
  <h3>d4numr - Number:</h3>
  <div id="d4_numr"></div>
  <h3>d6pips - Pips:</h3>
  <div id="d6_pips"></div>
  <h3>d6numr - Number:</h3>
  <div id="d6_numr"></div>
  <h3>d6pips - Colored Pips:</h3>
  <div id="d6_cpip"></div>
  <h3>d6memr - Memoir:</h3>
  <div id="d6_memr"></div>
  <h3>d6quid - Quarriors Quidity:</h3>
  <div id="d6_quid"></div>
  <h3>d6pdrt - AH Paydirt:</h3>
  <div id="d6_pdrt"></div>
  <h3>d6rfdw - Run, Fight, Die! White:</h3>
  <div id="d6_rfdw"></div>
  <h3>d6rfdg - Run, Fight, Die! Grey:</h3>
  <div id="d6_rfdg"></div>
  <h3>d6rfdb - Run, Fight, Die! Black:</h3>
  <div id="d6_rfdb"></div>
  <h3>d6rfdp - Run, Fight, Die! Pink:</h3>
  <div id="d6_rfdp"></div>
  <h3>d8numr - Number:</h3>
  <div id="d8_numr"></div>
  <h3>d10numr - Number:</h3>
  <div id="d10_numr"></div>
  <h3>d12numr - Number:</h3>
  <div id="d12_numr"></div>
  <h3>d20numr - Number:</h3>
  <div id="d20_numr"></div>
  <hr class="fancyHR">
  <p>Any Number or Pips die may be modified for color. Use the following format: 2d6pips#111111#222222#333333 where #111111 is the die background color, #222222 is the die outer edge color, and #333333 is the die pip/number color.</p>
  <hr class="fancyHR">
  <h3>d10numr - Number, Colored:</h3>
  <p>Orange background, Black edge, Grey number (5d10numr#FFA500#000000#808080)</p>
  <div id="d10_color"></div>
  <h3>d6pips - Pips, Colored:</h3>
  <p>Forest Green background and edge, White pips (5d6pips#228B22#228B22#FFFFFF)</p>
  <div id="d6_color"></div>
</div>
<br>
<p id="debug"></p>
</article>
<aside>
<div id="side_header">
<h2>Statistics</h2>
<form id="history_form" action="javascript:void(0);">
<fieldset>
<input type="radio" name="dicesize" value="F" />1
<input type="radio" name="dicesize" value="T" />&frac34;
<input type="radio" name="dicesize" value="H" checked="checked" />&frac12;
<input type="radio" name="dicesize" value="Q" />&frac14;
</fieldset>
</form>
</div> <!-- end of "side_header" -->
<div id="last_rolls">
<p>Last 10 rolls:</p>
<ol id="last_list">
<li>No history for this session.</li>
</ol>
</div> <!-- end of "last_rolls" -->
<div id="stats_tab">
  <h3>d4 Stats</h3>
    <div>
    <table>
      <thead>
        <tr><th colspan="5">Distribution Table</th></tr>
        <tr><td>Face</td><td>Session</td><td>%</td><td>Ever</td><td>%</td></tr>
      </thead>
      <tbody>
        <tr><td>Side 1</td><td><span id="d4s1">0</span></td><td><span id="pd4s1">0</span></td><td><span id="ed4s1">0</span></td><td><span id="ped4s1">0</span></td></tr>
        <tr><td>Side 2</td><td><span id="d4s2">0</span></td><td><span id="pd4s2">0</span></td><td><span id="ed4s2">0</span></td><td><span id="ped4s2">0</span></td></tr>
        <tr><td>Side 3</td><td><span id="d4s3">0</span></td><td><span id="pd4s3">0</span></td><td><span id="ed4s3">0</span></td><td><span id="ped4s3">0</span></td></tr>
        <tr><td>Side 4</td><td><span id="d4s4">0</span></td><td><span id="pd4s4">0</span></td><td><span id="ed4s4">0</span></td><td><span id="ped4s4">0</span></td></tr>
      </tbody>
    </table>
    </div>
  <h3>d6 Stats</h3>
    <div>
    <table>
      <thead>
        <tr><th colspan="5">Distribution Table</th></tr>
        <tr><td>Face</td><td>Session</td><td>%</td><td>Ever</td><td>%</td></tr>
      </thead>
      <tbody>
        <tr><td>Side 1</td><td><span id="d6s1">0</span></td><td><span id="pd6s1">0</span></td><td><span id="ed6s1">0</span></td><td><span id="ped6s1">0</span></td></tr>
        <tr><td>Side 2</td><td><span id="d6s2">0</span></td><td><span id="pd6s2">0</span></td><td><span id="ed6s2">0</span></td><td><span id="ped6s2">0</span></td></tr>
        <tr><td>Side 3</td><td><span id="d6s3">0</span></td><td><span id="pd6s3">0</span></td><td><span id="ed6s3">0</span></td><td><span id="ped6s3">0</span></td></tr>
        <tr><td>Side 4</td><td><span id="d6s4">0</span></td><td><span id="pd6s4">0</span></td><td><span id="ed6s4">0</span></td><td><span id="ped6s4">0</span></td></tr>
        <tr><td>Side 5</td><td><span id="d6s5">0</span></td><td><span id="pd6s5">0</span></td><td><span id="ed6s5">0</span></td><td><span id="ped6s5">0</span></td></tr>
        <tr><td>Side 6</td><td><span id="d6s6">0</span></td><td><span id="pd6s6">0</span></td><td><span id="ed6s6">0</span></td><td><span id="ped6s6">0</span></td></tr>
      </tbody>
    </table>
    </div>
  <h3>d8 Stats</h3>
  <div>
    <table>
      <thead>
        <tr><th colspan="5">Distribution Table</th></tr>
        <tr><td>Face</td><td>Session</td><td>%</td><td>Ever</td><td>%</td></tr>
      </thead>
      <tbody>
        <tr><td>Side 1</td><td><span id="d8s1">0</span></td><td><span id="pd8s1">0</span></td><td><span id="ed8s1">0</span></td><td><span id="ped8s1">0</span></td></tr>
        <tr><td>Side 2</td><td><span id="d8s2">0</span></td><td><span id="pd8s2">0</span></td><td><span id="ed8s2">0</span></td><td><span id="ped8s2">0</span></td></tr>
        <tr><td>Side 3</td><td><span id="d8s3">0</span></td><td><span id="pd8s3">0</span></td><td><span id="ed8s3">0</span></td><td><span id="ped8s3">0</span></td></tr>
        <tr><td>Side 4</td><td><span id="d8s4">0</span></td><td><span id="pd8s4">0</span></td><td><span id="ed8s4">0</span></td><td><span id="ped8s4">0</span></td></tr>
        <tr><td>Side 5</td><td><span id="d8s5">0</span></td><td><span id="pd8s5">0</span></td><td><span id="ed8s5">0</span></td><td><span id="ped8s5">0</span></td></tr>
        <tr><td>Side 6</td><td><span id="d8s6">0</span></td><td><span id="pd8s6">0</span></td><td><span id="ed8s6">0</span></td><td><span id="ped8s6">0</span></td></tr>
        <tr><td>Side 7</td><td><span id="d8s7">0</span></td><td><span id="pd8s7">0</span></td><td><span id="ed8s7">0</span></td><td><span id="ped8s7">0</span></td></tr>
        <tr><td>Side 8</td><td><span id="d8s8">0</span></td><td><span id="pd8s8">0</span></td><td><span id="ed8s8">0</span></td><td><span id="ped8s8">0</span></td></tr>
      </tbody>
    </table>
  </div>
  <h3>d10 Stats</h3>
  <div>
    <table>
      <thead>
        <tr><th colspan="5">Distribution Table</th></tr>
        <tr><td>Face</td><td>Session</td><td>%</td><td>Ever</td><td>%</td></tr>
      </thead>
      <tbody>
        <tr><td>Side 1</td><td><span id="d10s1">0</span></td><td><span id="pd10s1">0</span></td><td><span id="ed10s1">0</span></td><td><span id="ped10s1">0</span></td></tr>
        <tr><td>Side 2</td><td><span id="d10s2">0</span></td><td><span id="pd10s2">0</span></td><td><span id="ed10s2">0</span></td><td><span id="ped10s2">0</span></td></tr>
        <tr><td>Side 3</td><td><span id="d10s3">0</span></td><td><span id="pd10s3">0</span></td><td><span id="ed10s3">0</span></td><td><span id="ped10s3">0</span></td></tr>
        <tr><td>Side 4</td><td><span id="d10s4">0</span></td><td><span id="pd10s4">0</span></td><td><span id="ed10s4">0</span></td><td><span id="ped10s4">0</span></td></tr>
        <tr><td>Side 5</td><td><span id="d10s5">0</span></td><td><span id="pd10s5">0</span></td><td><span id="ed10s5">0</span></td><td><span id="ped10s5">0</span></td></tr>
        <tr><td>Side 6</td><td><span id="d10s6">0</span></td><td><span id="pd10s6">0</span></td><td><span id="ed10s6">0</span></td><td><span id="ped10s6">0</span></td></tr>
        <tr><td>Side 7</td><td><span id="d10s7">0</span></td><td><span id="pd10s7">0</span></td><td><span id="ed10s7">0</span></td><td><span id="ped10s7">0</span></td></tr>
        <tr><td>Side 8</td><td><span id="d10s8">0</span></td><td><span id="pd10s8">0</span></td><td><span id="ed10s8">0</span></td><td><span id="ped10s8">0</span></td></tr>
        <tr><td>Side 9</td><td><span id="d10s9">0</span></td><td><span id="pd10s9">0</span></td><td><span id="ed10s9">0</span></td><td><span id="ped10s9">0</span></td></tr>
        <tr><td>Side 10</td><td><span id="d10s10">0</span></td><td><span id="pd10s10">0</span></td><td><span id="ed10s10">0</span></td><td><span id="ped10s10">0</span></td></tr>
      </tbody>
    </table>
  </div>
  <h3>d12 Stats</h3>
  <div>
    <table>
      <thead>
        <tr><th colspan="5">Distribution Table</th></tr>
        <tr><td>Face</td><td>Session</td><td>%</td><td>Ever</td><td>%</td></tr>
      </thead>
      <tbody>
        <tr><td>Side 1</td><td><span id="d12s1">0</span></td><td><span id="pd12s1">0</span></td><td><span id="ed12s1">0</span></td><td><span id="ped12s1">0</span></td></tr>
        <tr><td>Side 2</td><td><span id="d12s2">0</span></td><td><span id="pd12s2">0</span></td><td><span id="ed12s2">0</span></td><td><span id="ped12s2">0</span></td></tr>
        <tr><td>Side 3</td><td><span id="d12s3">0</span></td><td><span id="pd12s3">0</span></td><td><span id="ed12s3">0</span></td><td><span id="ped12s3">0</span></td></tr>
        <tr><td>Side 4</td><td><span id="d12s4">0</span></td><td><span id="pd12s4">0</span></td><td><span id="ed12s4">0</span></td><td><span id="ped12s4">0</span></td></tr>
        <tr><td>Side 5</td><td><span id="d12s5">0</span></td><td><span id="pd12s5">0</span></td><td><span id="ed12s5">0</span></td><td><span id="ped12s5">0</span></td></tr>
        <tr><td>Side 6</td><td><span id="d12s6">0</span></td><td><span id="pd12s6">0</span></td><td><span id="ed12s6">0</span></td><td><span id="ped12s6">0</span></td></tr>
        <tr><td>Side 7</td><td><span id="d12s7">0</span></td><td><span id="pd12s7">0</span></td><td><span id="ed12s7">0</span></td><td><span id="ped12s7">0</span></td></tr>
        <tr><td>Side 8</td><td><span id="d12s8">0</span></td><td><span id="pd12s8">0</span></td><td><span id="ed12s8">0</span></td><td><span id="ped12s8">0</span></td></tr>
        <tr><td>Side 9</td><td><span id="d12s9">0</span></td><td><span id="pd12s9">0</span></td><td><span id="ed12s9">0</span></td><td><span id="ped12s9">0</span></td></tr>
        <tr><td>Side 10</td><td><span id="d12s10">0</span></td><td><span id="pd12s10">0</span></td><td><span id="ed12s10">0</span></td><td><span id="ped12s10">0</span></td></tr>
        <tr><td>Side 11</td><td><span id="d12s11">0</span></td><td><span id="pd12s11">0</span></td><td><span id="ed12s11">0</span></td><td><span id="ped12s11">0</span></td></tr>
        <tr><td>Side 12</td><td><span id="d12s12">0</span></td><td><span id="pd12s12">0</span></td><td><span id="ed12s12">0</span></td><td><span id="ped12s12">0</span></td></tr>
      </tbody>
    </table>
  </div>
  <h3>d20 Stats</h3>
  <div>
    <table>
      <thead>
        <tr><th colspan="5">Distribution Table</th></tr>
        <tr><td>Face</td><td>Session</td><td>%</td><td>Ever</td><td>%</td></tr>
      </thead>
      <tbody>
        <tr><td>Side 1</td><td><span id="d20s1">0</span></td><td><span id="pd20s1">0</span></td><td><span id="ed20s1">0</span></td><td><span id="ped20s1">0</span></td></tr>
        <tr><td>Side 2</td><td><span id="d20s2">0</span></td><td><span id="pd20s2">0</span></td><td><span id="ed20s2">0</span></td><td><span id="ped20s2">0</span></td></tr>
        <tr><td>Side 3</td><td><span id="d20s3">0</span></td><td><span id="pd20s3">0</span></td><td><span id="ed20s3">0</span></td><td><span id="ped20s3">0</span></td></tr>
        <tr><td>Side 4</td><td><span id="d20s4">0</span></td><td><span id="pd20s4">0</span></td><td><span id="ed20s4">0</span></td><td><span id="ped20s4">0</span></td></tr>
        <tr><td>Side 5</td><td><span id="d20s5">0</span></td><td><span id="pd20s5">0</span></td><td><span id="ed20s5">0</span></td><td><span id="ped20s5">0</span></td></tr>
        <tr><td>Side 6</td><td><span id="d20s6">0</span></td><td><span id="pd20s6">0</span></td><td><span id="ed20s6">0</span></td><td><span id="ped20s6">0</span></td></tr>
        <tr><td>Side 7</td><td><span id="d20s7">0</span></td><td><span id="pd20s7">0</span></td><td><span id="ed20s7">0</span></td><td><span id="ped20s7">0</span></td></tr>
        <tr><td>Side 8</td><td><span id="d20s8">0</span></td><td><span id="pd20s8">0</span></td><td><span id="ed20s8">0</span></td><td><span id="ped20s8">0</span></td></tr>
        <tr><td>Side 9</td><td><span id="d20s9">0</span></td><td><span id="pd20s9">0</span></td><td><span id="ed20s9">0</span></td><td><span id="ped20s9">0</span></td></tr>
        <tr><td>Side 10</td><td><span id="d20s10">0</span></td><td><span id="pd20s10">0</span></td><td><span id="ed20s10">0</span></td><td><span id="ped20s10">0</span></td></tr>
        <tr><td>Side 11</td><td><span id="d20s11">0</span></td><td><span id="pd20s11">0</span></td><td><span id="ed20s11">0</span></td><td><span id="ped20s11">0</span></td></tr>
        <tr><td>Side 12</td><td><span id="d20s12">0</span></td><td><span id="pd20s12">0</span></td><td><span id="ed20s12">0</span></td><td><span id="ped20s12">0</span></td></tr>
        <tr><td>Side 13</td><td><span id="d20s13">0</span></td><td><span id="pd20s13">0</span></td><td><span id="ed20s13">0</span></td><td><span id="ped20s13">0</span></td></tr>
        <tr><td>Side 14</td><td><span id="d20s14">0</span></td><td><span id="pd20s14">0</span></td><td><span id="ed20s14">0</span></td><td><span id="ped20s14">0</span></td></tr>
        <tr><td>Side 15</td><td><span id="d20s15">0</span></td><td><span id="pd20s15">0</span></td><td><span id="ed20s15">0</span></td><td><span id="ped20s15">0</span></td></tr>
        <tr><td>Side 16</td><td><span id="d20s16">0</span></td><td><span id="pd20s16">0</span></td><td><span id="ed20s16">0</span></td><td><span id="ped20s16">0</span></td></tr>
        <tr><td>Side 17</td><td><span id="d20s17">0</span></td><td><span id="pd20s17">0</span></td><td><span id="ed20s17">0</span></td><td><span id="ped20s17">0</span></td></tr>
        <tr><td>Side 18</td><td><span id="d20s18">0</span></td><td><span id="pd20s18">0</span></td><td><span id="ed20s18">0</span></td><td><span id="ped20s18">0</span></td></tr>
        <tr><td>Side 19</td><td><span id="d20s19">0</span></td><td><span id="pd20s19">0</span></td><td><span id="ed20s19">0</span></td><td><span id="ped20s19">0</span></td></tr>
        <tr><td>Side 20</td><td><span id="d20s20">0</span></td><td><span id="pd20s20">0</span></td><td><span id="ed20s20">0</span></td><td><span id="ped20s20">0</span></td></tr>
      </tbody>
    </table>
  </div>
</div> <!-- end of "stats_tab" -->
</aside>
</section>
</main>
<script type="text/javascript">
/* <![CDATA[ */
  var dieRegex = /(\d+)(d\d+)(\w{4})(?:#([0-9A-F]{6})#([0-9A-F]{6})#([0-9A-F]{6}))?/ig;
  var maxDice = 20;
  var currentDice = 2;
  var reRollLeft = 0;
  var wasReRoll = false;
  var cRoll = 0;
  var cHold = new Array();
  var whichDie = new Array();
  var history_class = "H";
  var customColors = false;
  var items = [
    {
        name:'d4 (four sided)',
        value: 'd4',
        subitems: [
            {name:'number', value:'numr'}
        ]
    },
    {
        name: 'd6 (six sided)',
        value: 'd6',
        subitems: [
            {name:'standard (pips)', value:'pips'},
            {name:'number', value:'numr'},
            {name:'colored pips', value:'cpip'},
            {name:'DoW Memoir', value:'memr'},
            {name:'Quarriors Quidity', value:'quid'},
            {name:'AH Paydirt', value:'pdrt'},
            {name:'RFD White', value:'rfdw'},
            {name:'RFD Grey', value:'rfdg'},
            {name:'RFD Black', value:'rfdb'},
            {name:'RFD Pink', value:'rfdp'}
        ]
    },
    {
        name:'d8 (eight sided)',
        value: 'd8',
        subitems: [
            {name:'number', value:'numr'}
        ]
    },
    {
        name:'d10 (ten sided)',
        value: 'd10',
        subitems: [
            {name:'number', value:'numr'}
        ]
    },
    {
        name:'d12 (twelve sided)',
        value: 'd12',
        subitems: [
            {name:'number', value:'numr'}
        ]
    },
    {
        name:'d20 (twenty sided)',
        value: 'd20',
        subitems: [
            {name:'number', value:'numr'}
        ]
    },
  ];
  var mainmenu = {};
  $.each(items, function(){
    $("<option />")
    .attr("value", this.value)
    .html(this.name)
    .appendTo("#dicetype");
    mainmenu[this.value] = this.subitems;
  });
  $('select[name="dicetype"]').find('option:contains("d6")').attr("selected",true);
  $("#dicetype").change(function(){
    var value = $(this).val();
    var submenu = $("#diceface");
    submenu.empty();
    $.each(mainmenu[value], function(){
        $("<option />")
        .attr("value", this.value)
        .html(this.name)
        .appendTo(submenu);
    });
  }).change();
  $( function() {
    $("#dice_form input[type=submit], #dshort_form input[type=submit], #help, #save01, #save02, #save03, #save04, #save05, #save06, #save07, #save08, #save09, #save10, #roll01, #roll02, #roll03, #roll04, #roll05, #roll06, #roll07, #roll08, #roll09, #roll10").button();
    $("#die_sizer").slider({min: 49, max: 557, value: 49,
      create: function() {$("#sizer-handle").text($(this).slider("value"));},
      slide: function( event, ui ) { $("#sizer-handle").text(ui.value); $(".die span, #roll_result .F").css({"width": ui.value+"px", "height": ui.value+"px"}); }
    });
    $("#help_dialog").dialog({autoOpen: false, width: "auto", height: "auto"});
    $("#help").on("click", function() { $("#help_dialog").dialog("open"); });
    $("#form_tabs").tabs();
  } );
  if (typeof(Storage) !== "undefined") {
    if (localStorage.getItem("store01") !== null) { $('input[name="store01"]').val(localStorage.store01); }
    if (localStorage.getItem("store02") !== null) { $('input[name="store02"]').val(localStorage.store02); }
    if (localStorage.getItem("store03") !== null) { $('input[name="store03"]').val(localStorage.store03); }
    if (localStorage.getItem("store04") !== null) { $('input[name="store04"]').val(localStorage.store04); }
    if (localStorage.getItem("store05") !== null) { $('input[name="store05"]').val(localStorage.store05); }
    if (localStorage.getItem("store06") !== null) { $('input[name="store06"]').val(localStorage.store06); }
    if (localStorage.getItem("store07") !== null) { $('input[name="store07"]').val(localStorage.store07); }
    if (localStorage.getItem("store08") !== null) { $('input[name="store08"]').val(localStorage.store08); }
    if (localStorage.getItem("store09") !== null) { $('input[name="store09"]').val(localStorage.store09); }
    if (localStorage.getItem("store10") !== null) { $('input[name="store10"]').val(localStorage.store10); }
    if (localStorage.getItem("reroll01") !== null) { $('input[name="reroll01"]').val(localStorage.reroll01); }
    if (localStorage.getItem("reroll02") !== null) { $('input[name="reroll02"]').val(localStorage.reroll02); }
    if (localStorage.getItem("reroll03") !== null) { $('input[name="reroll03"]').val(localStorage.reroll03); }
    if (localStorage.getItem("reroll04") !== null) { $('input[name="reroll04"]').val(localStorage.reroll04); }
    if (localStorage.getItem("reroll05") !== null) { $('input[name="reroll05"]').val(localStorage.reroll05); }
    if (localStorage.getItem("reroll06") !== null) { $('input[name="reroll06"]').val(localStorage.reroll06); }
    if (localStorage.getItem("reroll07") !== null) { $('input[name="reroll07"]').val(localStorage.reroll07); }
    if (localStorage.getItem("reroll08") !== null) { $('input[name="reroll08"]').val(localStorage.reroll08); }
    if (localStorage.getItem("reroll09") !== null) { $('input[name="reroll09"]').val(localStorage.reroll09); }
    if (localStorage.getItem("reroll10") !== null) { $('input[name="reroll10"]').val(localStorage.reroll10); }
    $('#save01').click(function() { localStorage.store01 = $('input[name="store01"]').val(); localStorage.reroll01 = $('input[name="reroll01"]').val(); });
    $('#save02').click(function() { localStorage.store02 = $('input[name="store02"]').val(); localStorage.reroll02 = $('input[name="reroll02"]').val(); });
    $('#save03').click(function() { localStorage.store03 = $('input[name="store03"]').val(); localStorage.reroll03 = $('input[name="reroll03"]').val(); });
    $('#save04').click(function() { localStorage.store04 = $('input[name="store04"]').val(); localStorage.reroll04 = $('input[name="reroll04"]').val(); });
    $('#save05').click(function() { localStorage.store05 = $('input[name="store05"]').val(); localStorage.reroll05 = $('input[name="reroll05"]').val(); });
    $('#save06').click(function() { localStorage.store06 = $('input[name="store06"]').val(); localStorage.reroll06 = $('input[name="reroll06"]').val(); });
    $('#save07').click(function() { localStorage.store07 = $('input[name="store07"]').val(); localStorage.reroll07 = $('input[name="reroll07"]').val(); });
    $('#save08').click(function() { localStorage.store08 = $('input[name="store08"]').val(); localStorage.reroll08 = $('input[name="reroll08"]').val(); });
    $('#save09').click(function() { localStorage.store09 = $('input[name="store09"]').val(); localStorage.reroll09 = $('input[name="reroll09"]').val(); });
    $('#save10').click(function() { localStorage.store10 = $('input[name="store10"]').val(); localStorage.reroll10 = $('input[name="reroll10"]').val(); });
    $('#roll01').click(function() { $('input[name="dshort"]').val($('input[name="store01"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll01"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll02').click(function() { $('input[name="dshort"]').val($('input[name="store02"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll02"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll03').click(function() { $('input[name="dshort"]').val($('input[name="store03"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll03"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll04').click(function() { $('input[name="dshort"]').val($('input[name="store04"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll04"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll05').click(function() { $('input[name="dshort"]').val($('input[name="store05"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll05"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll06').click(function() { $('input[name="dshort"]').val($('input[name="store06"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll06"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll07').click(function() { $('input[name="dshort"]').val($('input[name="store07"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll07"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll08').click(function() { $('input[name="dshort"]').val($('input[name="store08"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll08"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll09').click(function() { $('input[name="dshort"]').val($('input[name="store09"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll09"]').val()); $("#dshort_form").trigger('submit'); });
    $('#roll10').click(function() { $('input[name="dshort"]').val($('input[name="store10"]').val()); $('input[name="dsreroll"]').val($('input[name="reroll10"]').val()); $("#dshort_form").trigger('submit'); });
  } else {
    $("#your_store").text("<p>Your browser does not support local storage. You will be unable to store your custom dice here.</p>");
  }
  $("#dice_form").submit(function(event) {
    event.preventDefault();
    reRollLeft = ($('select[name="diceface"]').val() == "pdrt") ? 0 : $('input[name="reroll"]').val();
    currentDice = $('input[name="number"]').val();
    $('#roll_info').text('');
    $('#roll_result').html('<img src="ajax-loader_flower.gif" alt="loading">');
    customColors = false;
    wasReRoll = false;
    $.getJSON("roll_dice_svg.php?"+"<?php echo(SID); ?>"+"&dshort="+encodeURIComponent($('input[name="number"]').val()+$('select[name="dicetype"]').val())+$('select[name="diceface"]').val(), function(json){
      update(($('input[name="number"]').val()),($('select[name="diceface"]').val()),json);
    });
    $('#debug').text('Last roll syntax:  '+$('input[name="number"]').val()+$('select[name="dicetype"]').val()+$('select[name="diceface"]').val());
    return false;
  });
  $("#dshort_form").submit(function(event) {
    event.preventDefault();
    reRollLeft = $('input[name="dsreroll"]').val();
    $('#roll_info').text('');
    $('#roll_result').html('<img src="ajax-loader_flower.gif" alt="loading">');
    var parse = [];
    currentDice = 0;
    customColors = false;
    wasReRoll = false;
    dieRegex.lastIndex = 0;
    while ((parse = dieRegex.exec($('input[name="dshort"]').val())) !== null) {
      currentDice += Number(parse[1]);
      if (!(typeof parse[4] === 'undefined')) { customColors = true; }
    }
    $.getJSON("roll_dice_svg.php?"+"<?php echo(SID); ?>"+"&dshort="+encodeURIComponent($('input[name="dshort"]').val()), function(json){
      update(currentDice,$('input[name="dshort"]').val(),json);
    });
    $('#debug').text('Last roll syntax:  '+$('input[name="dshort"]').val());
    return false;
  });
  $('input[name="dicesize"]').change( function() {
    $("#last_list div").removeClass("F T H Q").addClass($('input[name="dicesize"]:checked').val());
  });
  $(function() {
    $( "#stats_tab" ).accordion({
      icons: { "header": "ui-icon-circle-triangle-e", "activeHeader": "ui-icon-circle-triangle-s" },
      collapsible: true,
      heightStyle: "content"
    });
  });
  $.getJSON("roll_dice_svg.php?"+"<?php echo(SID); ?>"+"&dshort=0d6pips", function(json){
    update("0", "none", json);
  });
  $.getJSON("roll_dice_svg.php?dshort=5d4numr&nohist=true", function(json){ $('#d4_numr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6pips&nohist=true", function(json){ $('#d6_pips').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6numr&nohist=true", function(json){ $('#d6_numr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6cpip&nohist=true", function(json){ $('#d6_cpip').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6memr&nohist=true", function(json){ $('#d6_memr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6quid&nohist=true", function(json){ $('#d6_quid').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6pdrt&nohist=true", function(json){ $('#d6_pdrt').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6rfdw&nohist=true", function(json){ $('#d6_rfdw').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6rfdg&nohist=true", function(json){ $('#d6_rfdg').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6rfdb&nohist=true", function(json){ $('#d6_rfdb').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d6rfdp&nohist=true", function(json){ $('#d6_rfdp').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d8numr&nohist=true", function(json){ $('#d8_numr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d10numr&nohist=true", function(json){ $('#d10_numr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d12numr&nohist=true", function(json){ $('#d12_numr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort=5d20numr&nohist=true", function(json){ $('#d20_numr').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort="+encodeURIComponent("5d10numr#FFA500#000000#808080")+"&nohist=true", function(json){ $('#d10_color').html(json.roll_html); });
  $.getJSON("roll_dice_svg.php?dshort="+encodeURIComponent("5d6pips#228B22#228B22#FFFFFF")+"&nohist=true", function(json){ $('#d6_color').html(json.roll_html); });

  function update(num, df, json) {
    if (json.numberrolls >= 1) {
      if (df == 'none') {
        $('#roll_info').text('You re-entered this page. Showing results from your previous roll.');
        $('#roll_result').html(json.stack[(json.numberrolls-1)]);
        wasReRoll = false;
        reRollLeft = 0;
      } else if (((num < 1)||(num > maxDice)) && (df !== 'pdrt')) {
        $('#roll_info').text('You entered an illegal value as the number of dice to roll. Showing results from your previous roll.');
        wasReRoll = false;
        reRollLeft = 0;
      } else {
        $('#roll_info').text('');
      }
      if (!wasReRoll) {
        $('#roll_result').html(json.stack[(json.numberrolls-1)]);
        if (reRollLeft > 0) {
            $("#roll_result .die").prepend('<span class="free"></span>');
            $("#roll_result .die").prepend('<span class="hold"></span>');
            $("#roll_result .die").click( function() {
              $(".hold", this).toggle();
              cHold[$(this).data("dnum")] = $(".hold", this).is(":visible");
            });
        }
        $(".die span, #roll_result .F").css({"width": $("#die_sizer").slider("option", "value")+"px", "height": $("#die_sizer").slider("option", "value")+"px"});
        cHold = [];
        for (var i = 1; i <= json.numberrolls; i++) {
          cHold[i] = $("#roll_result .die:nth-child("+i+") .hold").is(":visible");
        }
        if (df == 'pdrt') {
          $('#roll_result').append('<p>AH Paydirt value of this roll: Offense = '+json.ah_paydirt_off+'&nbsp;&nbsp;&nbsp;Defense = '+json.ah_paydirt_def+'</p>');
        }
        if (reRollLeft > 0) {
          $('#roll_result').append('<br /><br /><button id="reroll_dice">Re-Roll Dice</button>');
          $('#roll_result').append('&nbsp;&nbsp;<button id="clear_holds">Clear All Holds</button>&nbsp;&nbsp;Re-Rolls Left: <span id="reroll_left">' + reRollLeft + '</span><br />&nbsp;&nbsp;<br />');
          $( function() {
            $( "#reroll_dice, #clear_holds" ).button();
          } );
          $('#reroll_dice').click(function() {
            whichDie = [];
            var whichShort = "";
            var lastMatch = "";
            var rrShort = "";
            var rrCount = 0;
            var nRoll = 0;
            reRollLeft = reRollLeft - 1;
            wasReRoll = true;
            for (var j = 1; j <= currentDice; j++) {
              if (!cHold[j]) {
                nRoll = nRoll+1;
                whichDie[nRoll] = j;
                $("#roll_result .die:nth-child("+j+") svg").replaceWith('<img src="ajax-loader_clock.gif" alt="loading">');
                var rollThis = $("#roll_result .die:nth-child("+j+")").data("die");
                dieRegex.lastIndex = 0;
                parse = dieRegex.exec(rollThis);
                if ((nRoll != 1) && (parse[0] != lastMatch)) {
                  rrShort += rrCount + whichShort.substring(1);
                  rrCount = 0;
                }
                lastMatch = parse[0];
                if (customColors) {
                  whichShort = parse[0];
                } else {
                  whichShort = parse[1] + parse[2] + parse [3];
                }
                rrCount += 1;
              }
            }
            rrShort += rrCount + whichShort.substring(1);
            $.getJSON("roll_dice_svg.php?"+"<?php echo(SID); ?>"+"&dshort="+encodeURIComponent(rrShort), function(json){
              update(nRoll,$('select[name="diceface"]').val(), json);
            });
            $("#reroll_left").text(reRollLeft);
            if (reRollLeft <= 0) {
              $("#reroll_dice").prop("disabled", true);
              $("#reroll_dice, #clear_holds").button("disable");
              clear_holds();
              $(".free, .hold").remove();
            };
            $('#debug').text('Last roll syntax:  '+rrShort);
            return false;
          });
          $("#clear_holds").click(clear_holds);
        }
      } else {
        for (var k = 1; k <= num; k++) {
          $("#roll_result .die:nth-child("+whichDie[k]+") img").replaceWith(json.stack[(json.numberrolls-1)].match("data-dnum='"+k+"'.*?(<svg.*?</svg>)")[1]);
        }
      }
      $('#d4s1').html(json.d4s1);
      $('#d4s2').html(json.d4s2);
      $('#d4s3').html(json.d4s3);
      $('#d4s4').html(json.d4s4);
      total = json.d4s1 + json.d4s2 + json.d4s3 + json.d4s4;
      $('#pd4s1').html((json.d4s1*100/total).toFixed(2));
      $('#pd4s2').html((json.d4s2*100/total).toFixed(2));
      $('#pd4s3').html((json.d4s3*100/total).toFixed(2));
      $('#pd4s4').html((json.d4s4*100/total).toFixed(2));
      $('#ed4s1').html(json.ed4s1);
      $('#ed4s2').html(json.ed4s2);
      $('#ed4s3').html(json.ed4s3);
      $('#ed4s4').html(json.ed4s4);
      json.ed4s1 = Number(json.ed4s1);
      json.ed4s2 = Number(json.ed4s2);
      json.ed4s3 = Number(json.ed4s3);
      json.ed4s4 = Number(json.ed4s4);
      etotal = json.ed4s1 + json.ed4s2 + json.ed4s3 + json.ed4s4;
      $('#ped4s1').html((json.ed4s1*100/etotal).toFixed(2));
      $('#ped4s2').html((json.ed4s2*100/etotal).toFixed(2));
      $('#ped4s3').html((json.ed4s3*100/etotal).toFixed(2));
      $('#ped4s4').html((json.ed4s4*100/etotal).toFixed(2));
      $('#d6s1').html(json.d6s1);
      $('#d6s2').html(json.d6s2);
      $('#d6s3').html(json.d6s3);
      $('#d6s4').html(json.d6s4);
      $('#d6s5').html(json.d6s5);
      $('#d6s6').html(json.d6s6);
      total = json.d6s1 + json.d6s2 + json.d6s3 + json.d6s4 + json.d6s5 + json.d6s6;
      $('#pd6s1').html((json.d6s1*100/total).toFixed(2));
      $('#pd6s2').html((json.d6s2*100/total).toFixed(2));
      $('#pd6s3').html((json.d6s3*100/total).toFixed(2));
      $('#pd6s4').html((json.d6s4*100/total).toFixed(2));
      $('#pd6s5').html((json.d6s5*100/total).toFixed(2));
      $('#pd6s6').html((json.d6s6*100/total).toFixed(2));
      $('#ed6s1').html(json.ed6s1);
      $('#ed6s2').html(json.ed6s2);
      $('#ed6s3').html(json.ed6s3);
      $('#ed6s4').html(json.ed6s4);
      $('#ed6s5').html(json.ed6s5);
      $('#ed6s6').html(json.ed6s6);
      json.ed6s1 = Number(json.ed6s1);
      json.ed6s2 = Number(json.ed6s2);
      json.ed6s3 = Number(json.ed6s3);
      json.ed6s4 = Number(json.ed6s4);
      json.ed6s5 = Number(json.ed6s5);
      json.ed6s6 = Number(json.ed6s6);
      etotal = json.ed6s1 + json.ed6s2 + json.ed6s3 + json.ed6s4 + json.ed6s5 + json.ed6s6;
      $('#ped6s1').html((json.ed6s1*100/etotal).toFixed(2));
      $('#ped6s2').html((json.ed6s2*100/etotal).toFixed(2));
      $('#ped6s3').html((json.ed6s3*100/etotal).toFixed(2));
      $('#ped6s4').html((json.ed6s4*100/etotal).toFixed(2));
      $('#ped6s5').html((json.ed6s5*100/etotal).toFixed(2));
      $('#ped6s6').html((json.ed6s6*100/etotal).toFixed(2));
      $('#d8s1').html(json.d8s1);
      $('#d8s2').html(json.d8s2);
      $('#d8s3').html(json.d8s3);
      $('#d8s4').html(json.d8s4);
      $('#d8s5').html(json.d8s5);
      $('#d8s6').html(json.d8s6);
      $('#d8s7').html(json.d8s7);
      $('#d8s8').html(json.d8s8);
      total = json.d8s1 + json.d8s2 + json.d8s3 + json.d8s4 + json.d8s5 + json.d8s6 + json.d8s7 + json.d8s8;
      $('#pd8s1').html((json.d8s1*100/total).toFixed(2));
      $('#pd8s2').html((json.d8s2*100/total).toFixed(2));
      $('#pd8s3').html((json.d8s3*100/total).toFixed(2));
      $('#pd8s4').html((json.d8s4*100/total).toFixed(2));
      $('#pd8s5').html((json.d8s5*100/total).toFixed(2));
      $('#pd8s6').html((json.d8s6*100/total).toFixed(2));
      $('#pd8s7').html((json.d8s7*100/total).toFixed(2));
      $('#pd8s8').html((json.d8s8*100/total).toFixed(2));
      $('#ed8s1').html(json.ed8s1);
      $('#ed8s2').html(json.ed8s2);
      $('#ed8s3').html(json.ed8s3);
      $('#ed8s4').html(json.ed8s4);
      $('#ed8s5').html(json.ed8s5);
      $('#ed8s6').html(json.ed8s6);
      $('#ed8s7').html(json.ed8s7);
      $('#ed8s8').html(json.ed8s8);
      json.ed8s1 = Number(json.ed8s1);
      json.ed8s2 = Number(json.ed8s2);
      json.ed8s3 = Number(json.ed8s3);
      json.ed8s4 = Number(json.ed8s4);
      json.ed8s5 = Number(json.ed8s5);
      json.ed8s6 = Number(json.ed8s6);
      json.ed8s7 = Number(json.ed8s7);
      json.ed8s8 = Number(json.ed8s8);
      etotal = json.ed8s1 + json.ed8s2 + json.ed8s3 + json.ed8s4 + json.ed8s5 + json.ed8s6 + json.ed8s7 + json.ed8s8;
      $('#ped8s1').html((json.ed8s1*100/etotal).toFixed(2));
      $('#ped8s2').html((json.ed8s2*100/etotal).toFixed(2));
      $('#ped8s3').html((json.ed8s3*100/etotal).toFixed(2));
      $('#ped8s4').html((json.ed8s4*100/etotal).toFixed(2));
      $('#ped8s5').html((json.ed8s5*100/etotal).toFixed(2));
      $('#ped8s6').html((json.ed8s6*100/etotal).toFixed(2));
      $('#ped8s7').html((json.ed8s7*100/etotal).toFixed(2));
      $('#ped8s8').html((json.ed8s8*100/etotal).toFixed(2));
      $('#d10s1').html(json.d10s1);
      $('#d10s2').html(json.d10s2);
      $('#d10s3').html(json.d10s3);
      $('#d10s4').html(json.d10s4);
      $('#d10s5').html(json.d10s5);
      $('#d10s6').html(json.d10s6);
      $('#d10s7').html(json.d10s7);
      $('#d10s8').html(json.d10s8);
      $('#d10s9').html(json.d10s9);
      $('#d10s10').html(json.d10s10);
      total = json.d10s1 + json.d10s2 + json.d10s3 + json.d10s4 + json.d10s5 + json.d10s6 + json.d10s7 + json.d10s8 + json.d10s9 + json.d10s10;
      $('#pd10s1').html((json.d10s1*100/total).toFixed(2));
      $('#pd10s2').html((json.d10s2*100/total).toFixed(2));
      $('#pd10s3').html((json.d10s3*100/total).toFixed(2));
      $('#pd10s4').html((json.d10s4*100/total).toFixed(2));
      $('#pd10s5').html((json.d10s5*100/total).toFixed(2));
      $('#pd10s6').html((json.d10s6*100/total).toFixed(2));
      $('#pd10s7').html((json.d10s7*100/total).toFixed(2));
      $('#pd10s8').html((json.d10s8*100/total).toFixed(2));
      $('#pd10s9').html((json.d10s9*100/total).toFixed(2));
      $('#pd10s10').html((json.d10s10*100/total).toFixed(2));
      $('#ed10s1').html(json.ed10s1);
      $('#ed10s2').html(json.ed10s2);
      $('#ed10s3').html(json.ed10s3);
      $('#ed10s4').html(json.ed10s4);
      $('#ed10s5').html(json.ed10s5);
      $('#ed10s6').html(json.ed10s6);
      $('#ed10s7').html(json.ed10s7);
      $('#ed10s8').html(json.ed10s8);
      $('#ed10s9').html(json.ed10s9);
      $('#ed10s10').html(json.ed10s10);
      json.ed10s1 = Number(json.ed10s1);
      json.ed10s2 = Number(json.ed10s2);
      json.ed10s3 = Number(json.ed10s3);
      json.ed10s4 = Number(json.ed10s4);
      json.ed10s5 = Number(json.ed10s5);
      json.ed10s6 = Number(json.ed10s6);
      json.ed10s7 = Number(json.ed10s7);
      json.ed10s8 = Number(json.ed10s8);
      json.ed10s9 = Number(json.ed10s9);
      json.ed10s10 = Number(json.ed10s10);
      etotal = json.ed10s1 + json.ed10s2 + json.ed10s3 + json.ed10s4 + json.ed10s5 + json.ed10s6 + json.ed10s7 + json.ed10s8 + json.ed10s9 + json.ed10s10;
      $('#ped10s1').html((json.ed10s1*100/etotal).toFixed(2));
      $('#ped10s2').html((json.ed10s2*100/etotal).toFixed(2));
      $('#ped10s3').html((json.ed10s3*100/etotal).toFixed(2));
      $('#ped10s4').html((json.ed10s4*100/etotal).toFixed(2));
      $('#ped10s5').html((json.ed10s5*100/etotal).toFixed(2));
      $('#ped10s6').html((json.ed10s6*100/etotal).toFixed(2));
      $('#ped10s7').html((json.ed10s7*100/etotal).toFixed(2));
      $('#ped10s8').html((json.ed10s8*100/etotal).toFixed(2));
      $('#ped10s9').html((json.ed10s9*100/etotal).toFixed(2));
      $('#ped10s10').html((json.ed10s10*100/etotal).toFixed(2));
      $('#d12s1').html(json.d12s1);
      $('#d12s2').html(json.d12s2);
      $('#d12s3').html(json.d12s3);
      $('#d12s4').html(json.d12s4);
      $('#d12s5').html(json.d12s5);
      $('#d12s6').html(json.d12s6);
      $('#d12s7').html(json.d12s7);
      $('#d12s8').html(json.d12s8);
      $('#d12s9').html(json.d12s9);
      $('#d12s10').html(json.d12s10);
      $('#d12s11').html(json.d12s11);
      $('#d12s12').html(json.d12s12);
      total = json.d12s1 + json.d12s2 + json.d12s3 + json.d12s4 + json.d12s5 + json.d12s6 + json.d12s7 + json.d12s8 + json.d12s9 + json.d12s10 + json.d12s11 + json.d12s12;
      $('#pd12s1').html((json.d12s1*100/total).toFixed(2));
      $('#pd12s2').html((json.d12s2*100/total).toFixed(2));
      $('#pd12s3').html((json.d12s3*100/total).toFixed(2));
      $('#pd12s4').html((json.d12s4*100/total).toFixed(2));
      $('#pd12s5').html((json.d12s5*100/total).toFixed(2));
      $('#pd12s6').html((json.d12s6*100/total).toFixed(2));
      $('#pd12s7').html((json.d12s7*100/total).toFixed(2));
      $('#pd12s8').html((json.d12s8*100/total).toFixed(2));
      $('#pd12s9').html((json.d12s9*100/total).toFixed(2));
      $('#pd12s10').html((json.d12s10*100/total).toFixed(2));
      $('#pd12s11').html((json.d12s11*100/total).toFixed(2));
      $('#pd12s12').html((json.d12s12*100/total).toFixed(2));
      $('#ed12s1').html(json.ed12s1);
      $('#ed12s2').html(json.ed12s2);
      $('#ed12s3').html(json.ed12s3);
      $('#ed12s4').html(json.ed12s4);
      $('#ed12s5').html(json.ed12s5);
      $('#ed12s6').html(json.ed12s6);
      $('#ed12s7').html(json.ed12s7);
      $('#ed12s8').html(json.ed12s8);
      $('#ed12s9').html(json.ed12s9);
      $('#ed12s10').html(json.ed12s10);
      $('#ed12s11').html(json.ed12s11);
      $('#ed12s12').html(json.ed12s12);
      json.ed12s1 = Number(json.ed12s1);
      json.ed12s2 = Number(json.ed12s2);
      json.ed12s3 = Number(json.ed12s3);
      json.ed12s4 = Number(json.ed12s4);
      json.ed12s5 = Number(json.ed12s5);
      json.ed12s6 = Number(json.ed12s6);
      json.ed12s7 = Number(json.ed12s7);
      json.ed12s8 = Number(json.ed12s8);
      json.ed12s9 = Number(json.ed12s9);
      json.ed12s10 = Number(json.ed12s10);
      json.ed12s11 = Number(json.ed12s11);
      json.ed12s12 = Number(json.ed12s12);
      etotal = json.ed12s1 + json.ed12s2 + json.ed12s3 + json.ed12s4 + json.ed12s5 + json.ed12s6 + json.ed12s7 + json.ed12s8 + json.ed12s9 + json.ed12s10 + json.ed12s11 + json.ed12s12;
      $('#ped12s1').html((json.ed12s1*100/etotal).toFixed(2));
      $('#ped12s2').html((json.ed12s2*100/etotal).toFixed(2));
      $('#ped12s3').html((json.ed12s3*100/etotal).toFixed(2));
      $('#ped12s4').html((json.ed12s4*100/etotal).toFixed(2));
      $('#ped12s5').html((json.ed12s5*100/etotal).toFixed(2));
      $('#ped12s6').html((json.ed12s6*100/etotal).toFixed(2));
      $('#ped12s7').html((json.ed12s7*100/etotal).toFixed(2));
      $('#ped12s8').html((json.ed12s8*100/etotal).toFixed(2));
      $('#ped12s9').html((json.ed12s9*100/etotal).toFixed(2));
      $('#ped12s10').html((json.ed12s10*100/etotal).toFixed(2));
      $('#ped12s11').html((json.ed12s11*100/etotal).toFixed(2));
      $('#ped12s12').html((json.ed12s12*100/etotal).toFixed(2));
      $('#d20s1').html(json.d20s1);
      $('#d20s2').html(json.d20s2);
      $('#d20s3').html(json.d20s3);
      $('#d20s4').html(json.d20s4);
      $('#d20s5').html(json.d20s5);
      $('#d20s6').html(json.d20s6);
      $('#d20s7').html(json.d20s7);
      $('#d20s8').html(json.d20s8);
      $('#d20s9').html(json.d20s9);
      $('#d20s10').html(json.d20s10);
      $('#d20s11').html(json.d20s11);
      $('#d20s12').html(json.d20s12);
      $('#d20s13').html(json.d20s13);
      $('#d20s14').html(json.d20s14);
      $('#d20s15').html(json.d20s15);
      $('#d20s16').html(json.d20s16);
      $('#d20s17').html(json.d20s17);
      $('#d20s18').html(json.d20s18);
      $('#d20s19').html(json.d20s19);
      $('#d20s20').html(json.d20s20);
      total = json.d20s1 + json.d20s2 + json.d20s3 + json.d20s4 + json.d20s5 + json.d20s6 + json.d20s7 + json.d20s8 + json.d20s9 + json.d20s10 + json.d20s11 + json.d20s12 + json.d20s13 + json.d20s14 + json.d20s15 + json.d20s16 + json.d20s17 + json.d20s18 + json.d20s19 + json.d20s12;
      $('#pd20s1').html((json.d20s1*100/total).toFixed(2));
      $('#pd20s2').html((json.d20s2*100/total).toFixed(2));
      $('#pd20s3').html((json.d20s3*100/total).toFixed(2));
      $('#pd20s4').html((json.d20s4*100/total).toFixed(2));
      $('#pd20s5').html((json.d20s5*100/total).toFixed(2));
      $('#pd20s6').html((json.d20s6*100/total).toFixed(2));
      $('#pd20s7').html((json.d20s7*100/total).toFixed(2));
      $('#pd20s8').html((json.d20s8*100/total).toFixed(2));
      $('#pd20s9').html((json.d20s9*100/total).toFixed(2));
      $('#pd20s10').html((json.d20s10*100/total).toFixed(2));
      $('#pd20s11').html((json.d20s11*100/total).toFixed(2));
      $('#pd20s12').html((json.d20s12*100/total).toFixed(2));
      $('#pd20s13').html((json.d20s13*100/total).toFixed(2));
      $('#pd20s14').html((json.d20s14*100/total).toFixed(2));
      $('#pd20s15').html((json.d20s15*100/total).toFixed(2));
      $('#pd20s16').html((json.d20s16*100/total).toFixed(2));
      $('#pd20s17').html((json.d20s17*100/total).toFixed(2));
      $('#pd20s18').html((json.d20s18*100/total).toFixed(2));
      $('#pd20s19').html((json.d20s19*100/total).toFixed(2));
      $('#pd20s20').html((json.d20s20*100/total).toFixed(2));
      $('#ed20s1').html(json.ed20s1);
      $('#ed20s2').html(json.ed20s2);
      $('#ed20s3').html(json.ed20s3);
      $('#ed20s4').html(json.ed20s4);
      $('#ed20s5').html(json.ed20s5);
      $('#ed20s6').html(json.ed20s6);
      $('#ed20s7').html(json.ed20s7);
      $('#ed20s8').html(json.ed20s8);
      $('#ed20s9').html(json.ed20s9);
      $('#ed20s10').html(json.ed20s10);
      $('#ed20s11').html(json.ed20s11);
      $('#ed20s12').html(json.ed20s12);
      $('#ed20s13').html(json.ed20s13);
      $('#ed20s14').html(json.ed20s14);
      $('#ed20s15').html(json.ed20s15);
      $('#ed20s16').html(json.ed20s16);
      $('#ed20s17').html(json.ed20s17);
      $('#ed20s18').html(json.ed20s18);
      $('#ed20s19').html(json.ed20s19);
      $('#ed20s20').html(json.ed20s20);
      json.ed20s1 = Number(json.ed20s1);
      json.ed20s2 = Number(json.ed20s2);
      json.ed20s3 = Number(json.ed20s3);
      json.ed20s4 = Number(json.ed20s4);
      json.ed20s5 = Number(json.ed20s5);
      json.ed20s6 = Number(json.ed20s6);
      json.ed20s7 = Number(json.ed20s7);
      json.ed20s8 = Number(json.ed20s8);
      json.ed20s9 = Number(json.ed20s9);
      json.ed20s10 = Number(json.ed20s10);
      json.ed20s11 = Number(json.ed20s11);
      json.ed20s12 = Number(json.ed20s12);
      json.ed20s13 = Number(json.ed20s13);
      json.ed20s14 = Number(json.ed20s14);
      json.ed20s15 = Number(json.ed20s15);
      json.ed20s16 = Number(json.ed20s16);
      json.ed20s17 = Number(json.ed20s17);
      json.ed20s18 = Number(json.ed20s18);
      json.ed20s19 = Number(json.ed20s19);
      json.ed20s20 = Number(json.ed20s20);
      etotal = json.ed20s1 + json.ed20s2 + json.ed20s3 + json.ed20s4 + json.ed20s5 + json.ed20s6 + json.ed20s7 + json.ed20s8 + json.ed20s9 + json.ed20s10 + json.ed20s11 + json.ed20s12 + json.ed20s13 + json.ed20s14 + json.ed20s15 + json.ed20s16 + json.ed20s17 + json.ed20s18 + json.ed20s19 + json.ed20s20;
      $('#ped20s1').html((json.ed20s1*100/etotal).toFixed(2));
      $('#ped20s2').html((json.ed20s2*100/etotal).toFixed(2));
      $('#ped20s3').html((json.ed20s3*100/etotal).toFixed(2));
      $('#ped20s4').html((json.ed20s4*100/etotal).toFixed(2));
      $('#ped20s5').html((json.ed20s5*100/etotal).toFixed(2));
      $('#ped20s6').html((json.ed20s6*100/etotal).toFixed(2));
      $('#ped20s7').html((json.ed20s7*100/etotal).toFixed(2));
      $('#ped20s8').html((json.ed20s8*100/etotal).toFixed(2));
      $('#ped20s9').html((json.ed20s9*100/etotal).toFixed(2));
      $('#ped20s10').html((json.ed20s10*100/etotal).toFixed(2));
      $('#ped20s11').html((json.ed20s11*100/etotal).toFixed(2));
      $('#ped20s12').html((json.ed20s12*100/etotal).toFixed(2));
      $('#ped20s13').html((json.ed20s13*100/etotal).toFixed(2));
      $('#ped20s14').html((json.ed20s14*100/etotal).toFixed(2));
      $('#ped20s15').html((json.ed20s15*100/etotal).toFixed(2));
      $('#ped20s16').html((json.ed20s16*100/etotal).toFixed(2));
      $('#ped20s17').html((json.ed20s17*100/etotal).toFixed(2));
      $('#ped20s18').html((json.ed20s18*100/etotal).toFixed(2));
      $('#ped20s19').html((json.ed20s19*100/etotal).toFixed(2));
      $('#ped20s20').html((json.ed20s20*100/etotal).toFixed(2));
      update_history(num, df, json);
    }
  };

  function clear_holds() {
    for (var i=1; i<=maxDice; i++) {
      $("#roll_result .die:nth-child("+i+") .hold").hide();
      cHold[i] = false;
    };
  };

  function update_history(num, df, json) {
    for (var i = json.numberrolls - 2; i >= 0; i--) {
      json.stack[i] = json.stack[i].replace(/[FTHQ] die/img, ($('input[name="dicesize"]:checked').val())+" die");
    }
    if (df == 'none') {
      if (json.numberrolls > 1) {
        $('#last_list').html("");
      	for (var j = json.numberrolls - 2; j >= 0; j--) {
  		    $('#last_list').append("<li>"+ json.stack[j] + "</li>");
  	    }
      } else {
        $('#last_list').html('<p>No history for this session.</p>');
      }
    } else if (!(((num < 1)||(num > maxDice)) && (df !== 'pdrt'))) {
      if (json.numberrolls <= 1) {
        $('#last_list').html('<p>No history for this session.</p>');
      } else if (json.numberrolls == 2) {
        $('#last_list').html("<li>"+ json.stack[0] + "</li>");
      } else {
 		    $('#last_list').prepend("<li style='display:none'>"+ json.stack[(json.numberrolls-2)] + "</li>");
        $('#last_list li:first-child').slideDown();
        if ($('#last_list li').length >= 11) {
          $('#last_list li:last-child').slideUp(function() {
            $('#last_list li:last-child').remove();
          });
        }
      }
    }
  };
/* ]]> */
</script>
</body>
</html>
