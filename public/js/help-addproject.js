var options = {
    nextLabel: 'Next &rarr;',
    prevLabel: '&larr; Back',
    skipLabel: 'Exit',
    doneLabel: 'Done',
    tooltipPosition: 'auto',
    tooltipClass: '',
    exitOnEsc: true,
    exitOnOverlayClick: true,
    showStepNumbers: true,
    showProgress: false,
    showBullets: false,
    steps: [
        {
            element: ".step1",
            intro: "Start with your Project Information"
        },
        {
            element: ".step2",
            intro: "Name your project.",
        },
        {
            element: ".step3",
            intro: "It's not required but it would be better if you tell us your objective, so our team could help you better when there's something wrong with your project",
        },
        {
            element: ".step4",
            intro: "There're 2 ways:<br> \
            1. Step by step mode, make it easy for all users<br> \
            2. Advanced mode for advance users (no further explanation needed here)<br> \
            Let's start with Step by Step mode!",
        },
        {
            element: ".step5 li input",
            intro: "Write your first keyword here",
        },
        {
            element: ".step6",
            intro: "Add aditional form for your keyword. You can choose operation 'AND', 'OR', 'NOT' from dropdown button",
        },
        {
            element: ".step7",
            intro: "Add more keyword here, repeat the steps for more keywords as needed",
        },
        {
            element: ".step8",
            intro: "When you ready with your keywords, go to Next Step",
        },
        {
            element: ".step9 li input",
            intro: "Write your first topic here",
        },
        {
            element: ".step10",
            intro: "Add aditional form for your topic. You can choose operation 'AND', 'OR', 'NOT' from dropdown button",
        },
        {
            element: ".step11",
            intro: "Add more topic here, repeat the steps for more topic as needed",
        },
        {
            element: ".step12",
            intro: "When you ready with your topics, go to Next Step",
        },
        {
            element: ".step13 li input",
            intro: "Write your excluded topic here",
        },
        {
            element: ".step14",
            intro: "Add aditional form for your exclude. You can choose operation 'AND', 'OR', 'NOT' from dropdown button",
        },
        {
            element: ".step15",
            intro: "Add more exclude here, repeat the steps for more",
        },
        {
            element: ".step16",
            intro: "Preview your keywords, topics and excludes before save",
        },
        {
            element: ".step17",
            intro: "Press 'SAVE NOW' button to save the project.<br>That's all. Happy Monitoring!",
        }
    ]
};

function introAdd() {
    var intro = introJs();
    intro.setOptions(options);
    intro.oncomplete(function() {
        $("a.switchkeyword")[0].click();
    });
    intro.onexit(function(){
        $("a.switchkeyword")[0].click();
    });
    intro.start().onbeforechange(function () {

        /*if (intro._currentStep == "6") {
            $("a.switchkeyword")[0].click();
        } else if (intro._currentStep == "7") {
            $("a.switchtopic")[0].click();
        }*/
        //console.log(intro._currentStep);
        var current = intro._currentStep;
        console.log(current);
        if (current=="6") {
            $("a.switchkeyword")[0].click();
        } else if (current=="7") {
            $("a.switchtopic")[0].click();
        } else if (current=="10") {
            $("a.switchtopic")[0].click();
        } else if (current=="11") {
            $("a.switchexcld")[0].click();
        }

    });
    $("a.switchkeyword")[0].click();
}
