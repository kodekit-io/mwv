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
            intro: "Edit your Project Information"
        },
        {
            element: ".step2",
            intro: "Edit your current keywords",
        },
        {
            element: ".step3",
            intro: "Clik here to delete keyword",
        },
        {
            element: ".step4",
            intro: "If you need to add more keywords",
        },
        {
            element: ".step5",
            intro: "Edit your current topics",
        },
        {
            element: ".step6",
            intro: "Click here to delete topic",
        },
        {
            element: ".step7",
            intro: "Click here to add more topics",
        },
        {
            element: ".step8",
            intro: "Edit current exclude",
        },
        {
            element: ".step9",
            intro: "Click here to delete",
        },
        {
            element: ".step10",
            intro: "Add more exclude here",
        },
        {
            element: ".step11",
            intro: "These following steps are needed to modify your current Instagram monitoring project.",
        },
        {
            element: ".step12",
            intro: "Modify your hastags",
        },
        {
            element: ".step13",
            intro: "Modify your excluded hastags",
        },
        {
            element: ".step14",
            intro: "Modify current usernames",
        },
        {
            element: ".step15",
            intro: "Modify your excluded usernames",
        },
        {
            element: ".step16",
            intro: "Don't forget to save your changes",
        }
    ]
};

function introEdit() {
    var intro = introJs();
    intro.setOptions(options);
    intro.start();
}
