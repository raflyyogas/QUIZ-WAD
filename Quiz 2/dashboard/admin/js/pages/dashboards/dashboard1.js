/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
$(function () {
  "use strict";
  // ==============================================================
  // Newsletter
  // ==============================================================

  var offset = 0;
  plot();

  function plot() {
    var sin = [],
      cos = [];
    for (var i = 0; i < 5; i += 0.2) {
      sin.push([i, Math.sin(i + offset)]);
      cos.push([i, Math.cos(i + offset)]);
    }
    var options = {
      series: {
        lines: {
          show: true,
        },
        points: {
          show: true,
        },
      },
      grid: {
        hoverable: true, //IMPORTANT! this is needed for tooltip to work
      },
      yaxis: {
        min: -1.2,
        max: 1.2,
      },
      colors: ["#009efb", "#55ce63"],
      grid: {
        color: "#AFAFAF",
        hoverable: true,
        borderWidth: 0,
        backgroundColor: "#FFF",
      },
      tooltip: true,
      tooltipOpts: {
        content: "'%s' of %x.1 is %y.4",
        shifts: {
          x: -60,
          y: 25,
        },
      },
    };
    var plotObj = $.plot(
      $("#flot-line-chart"),
      [
        {
          data: sin,
          label: "Users",
        },
        {
          data: cos,
          label: "Product",
        },
      ],
      options
    );
  }
});
