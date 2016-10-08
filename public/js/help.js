function introAdd(){
    var intro = introJs();
    intro.setOptions({
        /* Next button label in tooltip box */
        nextLabel: 'Next &rarr;',
        /* Previous button label in tooltip box */
        prevLabel: '&larr; Back',
        /* Skip button label in tooltip box */
        skipLabel: 'Exit',
        /* Done button label in tooltip box */
        doneLabel: 'Done',
        /* Default tooltip box position */
        //tooltipPosition: 'bottom',
        /* Next CSS class for tooltip boxes */
        tooltipClass: '',
        /* Close introduction when pressing Escape button? */
        exitOnEsc: true,
        /* Close introduction when clicking on overlay layer? */
        exitOnOverlayClick: false,
        /* Show step numbers in introduction? */
        showStepNumbers: true,
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
                intro: "When you ready with your keywords, go to Next Step (Create Topics)",
            }
        ]
    });
    intro.start();
}
