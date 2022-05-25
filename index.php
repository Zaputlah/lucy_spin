<?php
    include "koneksi.php";
    $data = mysqli_query($con, "select * from hadiah_undian");
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Metro Wheel of Fortune </title>
    <link rel="shortcut icon" href="metro-app.png">
    
<!--
    
MIT License
Copyright (c) 2017 Jeremy Rue
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
-->
    
    <style type="text/css">
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap'); */
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;700&display=swap'); */
    @font-face {
        font-family: 'Poppins';
        src: url('Poppins/Poppins-ExtraBold.ttf');
    }
    body{
        background-image: url('background.jpeg');
        background-size: cover;
        font-family: 'Poppins';
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0;
    }
    text{
        font-size:18px;
        font-weight: bold;
        pointer-events:none;
    }
    #chart{
        position:relative;
        width:50%;
        left:10%;
    }
    #question{
        top: 5rem;
        position: relative;
        padding-left: 2rem;
        padding-top: 3rem;
        padding-left: 6rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: 45%;
        height: 100%;
    }
    #question h1{
        font-size: 64px;
        font-weight: bold;
        font-family: "Poppins";
        text-transform: uppercase;
        color: black;
        padding: 0;
        margin: 0;
        /* left: 40px; */
    }

    #question p{
        width: 100%;
        font-size: 38px;
        font-weight: bold;
        font-family: "Poppins";
        text-transform: capitalize;
        text-align: center;
        color:  white;
        padding: 1rem;
        margin: 0;
        background: #000;
        /* left: 40px; */
        padding-left: 2rem;
        padding-top: 1rem;
    }

    #container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
    }

    #undian-container {    
        display: flex;
        height: auto;
        align-items: flex-start;
        justify-content: flex-start;
        max-width: 1320px;
        width: 100%;
    }

    #top_container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    #top_container .allo_logo img {
        width: 250px;
    }

    #top_container .metro_logo img {
        width: 250px;
        padding: 4rem 6rem;
        margin-left: 20px;
    }

    #top_container .spin_title {
        margin-top: 3rem;
    }

    #top_container .spin_title span {
        background: #D82C39;
        border-radius: 25px;
        color: #fff;
        font-size: 64px;
        padding: 1rem 2rem 1rem;
        margin-left: -20px;
    }
    </style>
</head>
<body onload="timer = setTimeout('auto_reload()',27000);">
    <div id="container">
        <div id="top_container">
            <div class="spin_title">
                <span>SPIN & WIN</span>
            </div>
            <div class="allo_logo">
                <img src="Logo allo fest_Allo on Black.png">
            </div>
            <div class="metro_logo">
                <img src="Group 4.png">
            </div>
        </div>
        <div id="undian-container">
            <div id="chart"></div>
            <div id="question"><h1></h1><p id="gift"></p></div>
        </div>
    </div>
    
    <script src="d3.v3.min.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        var timer = null;
        function auto_reload()
        {
            window.location = 'http://localhost/metrospinwheel/';  //your page location
        }
        var padding = {top:20, right:40, bottom:0, left:0},
            w = 500 - padding.left - padding.right,
            h = 500 - padding.top  - padding.bottom,
            r = Math.min(w, h)/2,
            widthArrow = -15,
            rotation = 0,
            oldrotation = 0,
            picked = 100000,
            oldpick = [],
            color = d3.scale.category20();//category20c()
            //randomNumbers = getRandomNumbers();

        //http://osric.com/bingo-card-generator/?title=HTML+and+CSS+BINGO!&words=padding%2Cfont-family%2Ccolor%2Cfont-weight%2Cfont-size%2Cbackground-color%2Cnesting%2Cbottom%2Csans-serif%2Cperiod%2Cpound+sign%2C%EF%B9%A4body%EF%B9%A5%2C%EF%B9%A4ul%EF%B9%A5%2C%EF%B9%A4h1%EF%B9%A5%2Cmargin%2C%3C++%3E%2C{+}%2C%EF%B9%A4p%EF%B9%A5%2C%EF%B9%A4!DOCTYPE+html%EF%B9%A5%2C%EF%B9%A4head%EF%B9%A5%2Ccolon%2C%EF%B9%A4style%EF%B9%A5%2C.html%2CHTML%2CCSS%2CJavaScript%2Cborder&freespace=true&freespaceValue=Web+Design+Master&freespaceRandom=false&width=5&height=5&number=35#results

        var data = [
            <?php
                while($result = mysqli_fetch_array($data)){
            ?>
                    {"label":"<?=$result['No_undian']?>",  "value":1,  
                    
                    "question":" CONGRATULATIONS! YOU WIN",
                    "gift":"<?=$result['Nama_hadiah']?>" }, // padding
            <?php
                }
            ?>
        ];


        var svg = d3.select('#chart')
            .append("svg")
            .data([data])
            .attr("width",  w + padding.left + padding.right)
            .attr("height", h + padding.top + padding.bottom);
            

        var container = svg.append("g")
            .attr("class", "chartholder")
            .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");

        var vis = container
            .append("g");
            
        var pie = d3.layout.pie().sort(null).value(function(d){return 1;});

        // declare an arc generator function
        var arc = d3.svg.arc().outerRadius(r);

        // select paths, use arc generator to draw
        var arcs = vis.selectAll("g.slice")
            .data(pie)
            .enter()
            .append("g")
            .attr("class", "slice");
            

        arcs.append("path")
            .attr("fill", function(d, i){ return color(i); })
            .attr("d", function (d) { return arc(d); });
        
            
        // add the text
        arcs.append("text").attr("transform", function(d){
                d.innerRadius = 0;
                d.outerRadius = r;
                d.angle = (d.startAngle + d.endAngle)/2;
                return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
            })
            .attr("text-anchor", "end")
            .text( function(d, i) {
                return data[i].label;
            });

        container.on("click", spin);


        function spin(d){

            //all slices have been seen, all done
            console.log("OldPick: " + oldpick.length, "Data length: " + data.length);
            if(oldpick.length == data.length){
                // console.log("done");
                container.on("click", null);
                return;
            }
            
            
            var  ps       = 360/data.length,
                 pieslice = Math.round(10040/data.length),
                 rng      = Math.floor((Math.random() * 100440) + 360);
                
            rotation = (Math.round(rng / ps) * ps);
            
            picked = Math.round(data.length - (rotation % 360)/ps);
            picked = picked >= data.length ? (picked % data.length) : picked;

            // satu kali pilih
            // if(oldpick.indexOf(picked) !== -1){
            //     d3.select(this).call(spin);
            //     return;
            // } else {
            //     oldpick.push(picked);
            // }

            rotation += 90 - Math.round(ps/2);

            vis.transition()
                .duration(10000)
                .attrTween("transform", rotTween)
                .each("end", function(){

                    //mark question as seen
                    // d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                    //     .attr("fill", "#111");

                    // d3.select(".slice:nth-child(" + (picked + 1) + ") text")
                    //     .attr("fill", "#fff");

                    //populate question
                    d3.select("#question h1")
                        .text(data[picked].question);
                    d3.select("#question p")
                        .text(data[picked].gift);
                    // oldrotation = rotation;
                
                    container.on("click", spin);
                });


                // window.location.href("http://localhost/metrospinwheel/");
        }

        //make arrow
        svg.append("g")
            .attr("transform", "translate(" + (w + padding.right + widthArrow) + "," + ((h/2)+padding.top) + ")")
            .append("path")
            .attr("d", "M-" + (r*.25) + ",0L0," + (r*.10) + "L0,-" + (r*.10) + "Z")
            .style({"fill":"white","right":"500px"});

        //draw spin circle
        container.append("circle")
            .attr("cx", 0)
            .attr("cy", 0)
            .attr("r", 60)
            .style({"fill":"#8190D1","cursor":"pointer"});

        //spin text
        container.append("text")
            .attr("x", 0)
            .attr("y", 15)
            .attr("text-anchor", "middle")
            .text("SPIN")
            .style({"font-weight":"bold", "font-size":"30px", "fill":"#fff"});

            
        
        
        function rotTween(to) {
          var i = d3.interpolate(oldrotation % 360, rotation);
          return function(t) {
            return "rotate(" + i(t) + ")";
          };

        }
        
        
        function getRandomNumbers(){
            var array = new Uint16Array(3000);
            var scale = d3.scale.linear().range([360, 10440]).domain([0, 100000]);

            if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
                window.crypto.getRandomValues(array);
                console.log("works");
            } else {
                //no support for crypto, get crappy random numbers
                for(var i=0; i < 1000; i++){
                    array[i] = Math.floor(Math.random() * 100000) + 1;
                }
            }

            return array;
        }

    </script>
</body>
</html>