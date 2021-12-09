var progressBar = { // Golbal configuration
    appConfig: {
        pattern: 1, // 1 for stright line progressbar
        color: "#FFD800", //color of progressbar
        intervalAnmation: 20, // ms interval
        height: 5,
        zIndex: 1000, // px height 
        barWidth: 200
    },
    beforeProgressStart: function() {},
    afterProgressStop: function() {},
    addElement: function() {
        var progressBarDiv = document.createElement("div");
        progressBarDiv.className = "progressbar";
        document.body.appendChild(progressBarDiv);
    },
    config: function(configObject) {
        progressBar.appConfig = Object.assign(progressBar.appConfig, configObject);
        var temp = document.getElementsByClassName("progressbar");
        progressBar.element = temp[0];
        progressBar.cssSetFunction();
    },
    cssSetFunction: function() {
        progressBar.element.setAttribute("style", "display: block;");
        progressBar.element.setAttribute("style", "z-index:" + progressBar.appConfig.zIndex + ";");
        progressBar.element.style.position = "fixed";
        if (progressBar.appConfig.pattern == 3 || progressBar.appConfig.pattern == 4) {
            progressBar.element.style.width = progressBar.appConfig.barWidth + 'px';
            progressBar.element.style.left = -progressBar.appConfig.barWidth + 'px';
        } else {
            progressBar.element.style.width = "0%";
            progressBar.element.style.left = "0px";
        }
        progressBar.element.style.top = "0px";
        progressBar.element.style.background = progressBar.appConfig.color;
        progressBar.element.style.height = progressBar.appConfig.height + 'px';
    },
    progressBarFunction: function() { // Progressbar function 
        if (!progressBar.inprogressFlag) {
            progressBar.beforeProgressStart();
            switch (progressBar.appConfig.pattern) {
                case 1:
                    progressBar.inprogressFlag = true;
                    progressBar.element.style.width = '0%';
                    progressBar.progressBarFunctionPattern1();
                    break;
                case 2:
                    progressBar.inprogressFlag = true;
                    progressBar.progressBarFunctionPattern2(0);
                    break;
                case 3:
                    progressBar.inprogressFlag = true;
                    progressBar.progressBarFunctionPattern3();
                    break;
                case 4:
                    progressBar.inprogressFlag = true;
                    progressBar.progressBarFunctionPattern4();
                    break;
                case 5:
                    progressBar.inprogressFlag = true;
                    progressBar.progressBarFunctionPattern5();
                    break;
                default:
                    progressBar.inprogressFlag = true;
                    progressBar.element.style.width = '0%';
                    progressBar.progressBarFunctionPattern1();
                    break;
            }
        }
    },
    progressBarStart: function() { // start function
        if (!progressBar.inprogressFlag) {
            if (!progressBar.opecityFlag) {
                progressBar.progressBarFlag = true;
                progressBar.element.style.opacity = 1;
                progressBar.progressBarFunction();
            } else {
                setTimeout(function() {
                    progressBar.progressBarStart();
                }, 200);
            }
        }
    },
    progressBarStop: function() { // stop function
        if (progressBar.inprogressFlag) {
            progressBar.fadeOut();
            progressBar.progressBarFlag = false;
            progressBar.inprogressFlag = false;
            progressBar.afterProgressStop();
        }
    },
    progressBarFunctionPattern1: function() {
        var width = 0;
        var id = setInterval(frame, progressBar.appConfig.intervalAnmation);

        function frame() {
            if (progressBar.progressBarFlag) {
                if (width == 100) {
                    progressBar.element.style.width = '0%';
                    width = 0;
                } else {
                    width = width + 0.5;
                    progressBar.element.style.width = width + '%';
                }
            } else {
                progressBar.element.style.width = '100%';
                width = 0;
                clearInterval(id);
            }
        }
    },
    progressBarFunctionPattern2: function(percentProgress) {
        if (progressBar.progressBarFlag) {
            if (percentProgress > 100) {
                progressBar.progressBarStop();
            } else {
                progressBar.element.style.width = percentProgress + '%';
            }
        }
    },
    progressBarFunctionPattern3: function() {
        var id = setInterval(frame, progressBar.appConfig.intervalAnmation);
        var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var fromLeft = -progressBar.appConfig.barWidth;

        function frame() {
            if (progressBar.progressBarFlag) {
                if (fromLeft > progressBar.appConfig.barWidth + width) {
                    progressBar.element.style.left = -progressBar.appConfig.barWidth + 'px';
                    fromLeft = -progressBar.appConfig.barWidth;
                } else {
                    fromLeft += 10;
                    progressBar.element.style.left = fromLeft + 'px';
                }
            } else {
                clearInterval(id);
            }
        }
    },
    progressBarFunctionPattern4: function() {
        var id = setInterval(frame, progressBar.appConfig.intervalAnmation);
        var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var fromLeft = -progressBar.appConfig.barWidth;
        var toggle = false;

        function frame() {
            if (progressBar.progressBarFlag) {
                if (fromLeft > progressBar.appConfig.barWidth + width && !toggle) {
                    toggle = !toggle;
                } else if (fromLeft < -progressBar.appConfig.barWidth && toggle) {
                    toggle = !toggle;
                } else {
                    if (toggle) {
                        fromLeft -= 10;
                    } else {
                        fromLeft += 10;
                    }
                    progressBar.element.style.left = fromLeft + 'px';
                }
            } else {
                clearInterval(id);
            }
        }
    },
    progressBarFunctionPattern5: function() {
        var width = 0;
        var id = setInterval(frame, progressBar.appConfig.intervalAnmation);
        var toggle = false;

        function frame() {
            if (progressBar.progressBarFlag) {
                if (width == 100 && !toggle) {
                    toggle = true;
                } else if (width == 0 && toggle) {
                    toggle = false;
                } else {
                    if (toggle) {
                        width = width - 0.5;
                    } else {
                        width = width + 0.5;
                    }
                    progressBar.element.style.width = width + '%';
                }
            } else {
                progressBar.element.style.width = '100%';
                width = 0;
                clearInterval(id);
            }
        }
    },
    fadeOut: function() {
        var op = 1; // initial opacity
        progressBar.opecityFlag = true;
        var timer = setInterval(function() {
            if (op <= 0.1) {
                progressBar.element.style.opacity = 0;
                clearInterval(timer);
                progressBar.opecityFlag = false;
            } else {
                progressBar.element.style.opacity = op;
                progressBar.element.style.filter = 'alpha(opacity=' + op * 100 + ")";
                op -= op * 0.1;
            }
        }, 10);
    },
    element: {},
    progressBarFlag: false, // flage for progressbar
    inprogressFlag: false,
    opecityFlag: false
};
progressBar.addElement();
progressBar.config({ pattern: 1, color: "#206bc4", intervalAnmation: 10, height: 5, zIndex: 1000, barWidth: 200 });