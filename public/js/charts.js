var Charts = function () {
    //function to initiate jQRangeSlider
    //There are plenty of options you can set to control the precise looks of your plot. 
    //You can control the ticks on the axes, the legend, the graph type, etc.
    //For more information, please visit http://www.flotcharts.org/
    var runCharts = function () {
        // Basic Chart 
        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.25) {
            d1.push([i, Math.floor((Math.random() * 9) + 1)]);
        }
		/*
        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.25) {
            d2.push([i, Math.cos(i)]);
        }
        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.1) {
            d3.push([i, Math.tan(i)]);
        }
		*/
        $.plot("#placeholder", [{
            label: "Nakit Akışı",
            data: d1
        }], {
            series: {
                lines: {
                    show: true
                },
                points: {
                    show: true
                }
            },
            xaxis: {
                ticks: [0, [Math.PI / 2, ""],
                    [Math.PI, ""],
                    [Math.PI * 3 / 2, ""],
                    [Math.PI * 2, ""]
                ]
            },
            yaxis: {
                ticks: 10,
                min: 0,
                max: 10,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: {
                    colors: ["#fff", "#eee"]
                },
                borderWidth: {
                    top: 1,
                    right: 1,
                    bottom: 2,
                    left: 2
                }
            }
        });
        // Toggling Series 
        var datasets = {
            "usa": {
                label: "Matematik",
                data: [
                    [1988, 80],
                    [1989, 90],
                    [1990, 85],
                    [1991, 90],
                    [1992, 75],
                    [1993, 80],
                    [1994, 70],
                    [1995, 80],
                    [1996, 75],
                    [1997, 90],
                    [1998, 85],
                    [1999, 95],
                    [2000, 75],
                    [2001, 80],
                    [2002, 70],
                    [2003, 80],
                    [2004, 90],
                    [2005, 85],
                    [2006, 70]
                ]
            },
            "russia": {
                label: "Fizik",
                data: [
                    [1988, 70],
                    [1989, 60],
                    [1990, 65],
                    [1991, 70],
                    [1992, 70],
                    [1993, 90],
                    [1994, 60],
                    [1995, 55],
                    [1996, 65],
                    [1997, 60],
                    [1998, 70],
                    [1999, 70],
                    [2000, 65],
                    [2001, 75],
                    [2002, 60],
                    [2003, 55],
                    [2004, 70],
                    [2005, 60],
                    [2006, 75]
                ]
            },
            "uk": {
                label: "Kimya",
                data: [
                    [1988, 80],
                    [1989, 70],
                    [1990, 90],
                    [1991, 95],
                    [1992, 80],
                    [1993, 85],
                    [1994, 75],
                    [1995, 70],
                    [1996, 80],
                    [1997, 85],
                    [1998, 75],
                    [1999, 70],
                    [2000, 80],
                    [2001, 85],
                    [2002, 75],
                    [2003, 85],
                    [2004, 70],
                    [2005, 65],
                    [2006, 75]
                ]
            },
            "germany": {
                label: "Biyoloji",
                data: [
                    [1988, 90],
                    [1989, 90],
                    [1990, 85],
                    [1991, 90],
                    [1992, 75],
                    [1993, 80],
                    [1994, 70],
                    [1995, 80],
                    [1996, 75],
                    [1997, 90],
                    [1998, 85],
                    [1999, 95],
                    [2000, 75],
                    [2001, 80],
                    [2002, 70],
                    [2003, 80],
                    [2004, 90],
                    [2005, 85],
                    [2006, 70]
                ]
            },
            "denmark": {
                label: "Geometri",
                data: [
                    [1988, 70],
                    [1989, 60],
                    [1990, 65],
                    [1991, 70],
                    [1992, 65],
                    [1993, 60],
                    [1994, 70],
                    [1995, 70],
                    [1996, 65],
                    [1997, 80],
                    [1998, 75],
                    [1999, 65],
                    [2000, 60],
                    [2001, 70],
                    [2002, 60],
                    [2003, 70],
                    [2004, 75],
                    [2005, 65],
                    [2006, 70]
                ]
            },
            "sweden": {
                label: "Türkçe",
                data: [
                    [1988, 55],
                    [1989, 50],
                    [1990, 55],
                    [1991, 60],
                    [1992, 55],
                    [1993, 60],
                    [1994, 60],
                    [1995, 65],
                    [1996, 55],
                    [1997, 60],
                    [1998, 65],
                    [1999, 55],
                    [2000, 70],
                    [2001, 55],
                    [2002, 60],
                    [2003, 55],
                    [2004, 50],
                    [2005, 45],
                    [2006, 40]
                ]
            },
            "norway": {
                label: "İngilizce",
                data: [
                    [1988, 90],
                    [1989, 95],
                    [1990, 90],
                    [1991, 90],
                    [1992, 80],
                    [1993, 85],
                    [1994, 75],
                    [1995, 85],
                    [1996, 80],
                    [1997, 95],
                    [1998, 85],
                    [1999, 90],
                    [2000, 85],
                    [2001, 80],
                    [2002, 75],
                    [2003, 65],
                    [2004, 70],
                    [2005, 60],
                    [2006, 65]
                ]
            }
        };
        // hard-code color indices to prevent them from shifting as
        // countries are turned on/off
        var i = 0;
        $.each(datasets, function (key, val) {
            val.color = i;
            ++i;
        });
        // insert checkboxes
        var choiceContainer = $("#choices");
        $.each(datasets, function (key, val) {
            choiceContainer.append("<label for='id" + key + "' class='checkbox'><input type='checkbox' name='" + key + "' checked='checked' id='id" + key + "'>" + val.label + "</label>");
        });
        choiceContainer.find("input").iCheck({
            checkboxClass: 'icheckbox_minimal-grey',
            radioClass: 'iradio_minimal-grey',
            increaseArea: '10%' // optional
        }).on('ifClicked', function (event) {
            $(this).iCheck('toggle');
            plotAccordingToChoices();
        });

        function plotAccordingToChoices() {
            var data = [];
            choiceContainer.find("input:checked").each(function () {
                var key = $(this).attr("name");
                if (key && datasets[key]) {
                    data.push(datasets[key]);
                }
            });
            if (data.length > 0) {
                $.plot("#placeholder2", data, {
                    yaxis: {
                        min: 0
                    },
                    xaxis: {
                        tickDecimals: 0
                    }
                });
            }
        }
        plotAccordingToChoices();
        // Interactivity 
        function randValue() {
            return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
        }
        var pageviews = [
            [1, randValue()],
            [2, randValue()],
            [3, 2 + randValue()],
            [4, 3 + randValue()],
            [5, 5 + randValue()],
            [6, 10 + randValue()],
            [7, 15 + randValue()],
            [8, 20 + randValue()],
            [9, 25 + randValue()],
            [10, 30 + randValue()],
            [11, 35 + randValue()],
            [12, 25 + randValue()],
            [13, 15 + randValue()],
            [14, 20 + randValue()],
            [15, 45 + randValue()],
            [16, 50 + randValue()],
            [17, 65 + randValue()],
            [18, 70 + randValue()],
            [19, 85 + randValue()],
            [20, 80 + randValue()],
            [21, 75 + randValue()],
            [22, 80 + randValue()],
            [23, 75 + randValue()],
            [24, 70 + randValue()],
            [25, 65 + randValue()],
            [26, 75 + randValue()],
            [27, 80 + randValue()],
            [28, 85 + randValue()],
            [29, 90 + randValue()],
            [30, 95 + randValue()]
        ];
        var visitors = [
            [1, randValue() - 5],
            [2, randValue() - 5],
            [3, randValue() - 5],
            [4, 6 + randValue()],
            [5, 5 + randValue()],
            [6, 20 + randValue()],
            [7, 25 + randValue()],
            [8, 36 + randValue()],
            [9, 26 + randValue()],
            [10, 38 + randValue()],
            [11, 39 + randValue()],
            [12, 50 + randValue()],
            [13, 51 + randValue()],
            [14, 12 + randValue()],
            [15, 13 + randValue()],
            [16, 14 + randValue()],
            [17, 15 + randValue()],
            [18, 15 + randValue()],
            [19, 16 + randValue()],
            [20, 17 + randValue()],
            [21, 18 + randValue()],
            [22, 19 + randValue()],
            [23, 20 + randValue()],
            [24, 21 + randValue()],
            [25, 14 + randValue()],
            [26, 24 + randValue()],
            [27, 25 + randValue()],
            [28, 26 + randValue()],
            [29, 27 + randValue()],
            [30, 31 + randValue()]
        ];
        var plot = $.plot($("#placeholder3"), [{
            data: pageviews,
            label: "Alacak"
        }, {
            data: visitors,
            label: "Tahsil Edilen"
        }], {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.05
                        }, {
                            opacity: 0.01
                        }]
                    }
                },
                points: {
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#eee",
                borderWidth: 0
            },
            colors: ["#d12610", "#37b7f3", "#52e136"],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                ticks: 11,
                tickDecimals: 0
            }
        });

        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y + 5,
                left: x + 15,
                border: '1px solid #333',
                padding: '4px',
                color: '#fff',
                'border-radius': '3px',
                'background-color': '#333',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }
        var previousPoint = null;
        $("#placeholder3").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
        //Real Time 
        // We use an inline data source in the example, usually data would
        // be fetched from a server
        var data = [],
            totalPoints = 300;

        function getRandomData() {
            if (data.length > 0)
                data = data.slice(1);
            // Do a random walk
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;
                if (y < 0) {
                    y = 0;
                } else if (y > 100) {
                    y = 100;
                }
                data.push(y);
            }
            // Zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]]);
            }
            return res;
        }
        // Set up the control widget
        var updateInterval = 30;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1) {
                    updateInterval = 1;
                } else if (updateInterval > 2000) {
                    updateInterval = 2000;
                }
                $(this).val("" + updateInterval);
            }
        });
        var plot = $.plot("#placeholder4", [getRandomData()], {
            series: {
                shadowSize: 0 // Drawing is faster without shadows
            },
            yaxis: {
                min: 0,
                max: 100
            },
            xaxis: {
                show: false
            }
        });

        function update() {
            plot.setData([getRandomData()]);
            // Since the axes don't change, we don't need to call plot.setupGrid()
            plot.draw();
            setTimeout(update, updateInterval);
        }
        update();
        //Categories 
        var data_category = [
            ["Ocak", 10],
            ["Şubat", 8],
            ["Mart", 4],
            ["Nisan", 13],
            ["Mayıs", 17],
            ["Haziran", 9],
			["Temmuz", 11],
			["Ağustos", 14],
			["Eylül", 8],
			["Ekim", 12]
        ];
        $.plot("#placeholder5", [data_category], {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.6,
                    align: "center",
                    fillColor: "#4DBEF4",
                    lineWidth: 0,
                }
            },
            xaxis: {
                mode: "categories",
                tickLength: 0
            }
        });
        // Annotations
        var d_1 = [];
        for (var i = 0; i < 20; ++i) {
            d_1.push([i, Math.sin(i)]);
        }
        var data_annotation = [{
            data: d_1,
            label: "Pressure",
            color: "#333"
        }];
        var markings = [{
            color: "#f6f6f6",
            yaxis: {
                from: 1
            }
        }, {
            color: "#f6f6f6",
            yaxis: {
                to: -1
            }
        }, {
            color: "#000",
            lineWidth: 1,
            xaxis: {
                from: 2,
                to: 2
            }
        }, {
            color: "#000",
            lineWidth: 1,
            xaxis: {
                from: 8,
                to: 8
            }
        }];
        var placeholder = $("#placeholder6");
        var plot_annotation = $.plot(placeholder, data_annotation, {
            bars: {
                show: true,
                barWidth: 0.5,
                fill: 0.9
            },
            xaxis: {
                ticks: [],
                autoscaleMargin: 0.02
            },
            yaxis: {
                min: -2,
                max: 2
            },
            grid: {
                markings: markings
            }
        });
        var o = plot_annotation.pointOffset({
            x: 2,
            y: -1.2
        });
        // Append it to the placeholder that Flot already uses for positioning
        placeholder.append("<div style='position:absolute;left:" + (o.left + 4) + "px;top:" + o.top + "px;color:#666;font-size:smaller'>Warming up</div>");
        o = plot_annotation.pointOffset({
            x: 8,
            y: -1.2
        });
        placeholder.append("<div style='position:absolute;left:" + (o.left + 4) + "px;top:" + o.top + "px;color:#666;font-size:smaller'>Actual measurements</div>");
        // Draw a little arrow on top of the last label to demonstrate canvas
        // drawing
        var ctx = plot_annotation.getCanvas().getContext("2d");
        ctx.beginPath();
        o.left += 4;
        ctx.moveTo(o.left, o.top);
        ctx.lineTo(o.left, o.top - 10);
        ctx.lineTo(o.left + 10, o.top - 5);
        ctx.lineTo(o.left, o.top);
        ctx.fillStyle = "#000";
        ctx.fill();
        // Default Pie 
        var data_pie = [],
            series = Math.floor(Math.random() * 6) + 3;
        for (var i = 0; i < series; i++) {
            data_pie[i] = {
                label: "Series" + (i + 1),
                data: Math.floor(Math.random() * 100) + 1
            };
        }
        $.plot('#placeholder7', data_pie, {
            series: {
                pie: {
                    show: true
                }
            }
        });
        // Label Formatter 
        $.plot('#placeholder8', data_pie, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.8
                        }
                    }
                }
            },
            legend: {
                show: false
            }
        });
        // Label Style 
        $.plot('#placeholder9', data_pie, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.5,
                            color: '#000'
                        }
                    }
                }
            },
            legend: {
                show: false
            }
        });
        // Rectangular Pie
        $.plot('#placeholder10', data_pie, {
            series: {
                pie: {
                    show: true,
                    radius: 500,
                    label: {
                        show: true,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            }
        });
        // Tilted Pie 
        $.plot('#placeholder11', data_pie, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    tilt: 0.5,
                    label: {
                        show: true,
                        radius: 1,
                        formatter: labelFormatter,
                        background: {
                            opacity: 0.8
                        }
                    },
                    combine: {
                        color: '#999',
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            }
        });
        // Interactivity Pie
        $.plot('#placeholder12', data_pie, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        $("#placeholder12").bind("plotclick", function (event, pos, obj) {
            if (!obj) {
                return;
            }
            percent = parseFloat(obj.series.percent).toFixed(2);
            alert("" + obj.series.label + ": " + percent + "%");
        });

        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
        }
    };
    return {
        //main function to initiate template pages
        init: function () {
            runCharts();
        }
    };
}();