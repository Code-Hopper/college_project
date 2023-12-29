// add active class by default
document.querySelectorAll(".slide-card")[0].classList.add("active");
// disable and style disabled back button
document.querySelector("#previous-arrow").setAttribute("disabled", " ");
document.querySelector("#previous-arrow i").style.color = "#c5c5c5";
document.querySelector("#previous-arrow").classList.replace("bg-white", "bg-disabled");
// calculate number of slides
let count = document.querySelectorAll(".slide-card").length;


// move to next slide
function nextSlide() {
    // enable and style the back button
    document.querySelector("#previous-arrow").removeAttribute("disabled");
    document.querySelector("#previous-arrow i").style.color = "#212529";
    document.querySelector("#previous-arrow").classList.replace("bg-disabled", "bg-white");
    const elements = document.querySelectorAll('.slide-card');
    console.log(document.querySelector('.slider-wrap').children);
    for (let index = 0; index <= count; index++) {
        let valueIndex = null;
        if (elements[index].classList.contains('active')) {
            valueIndex = index;
        }
        if (valueIndex == 0) {
            setTimeout(() => {
                previousSlide();
            }, 560);
        }
        // set animations
        elements[index].classList.remove('move-left');
        elements[elements.length - 1].classList.remove('move-left');
        setTimeout(() => {
            elements[index].classList.add('move-left');
        }, 0);
        setTimeout(() => {
            elements[index].classList.remove('active');
            elements[2].classList.add('active');
            elements[index].classList.remove('move-left');
            elements[elements.length - 1].classList.remove('move-left');
            document.querySelector('.slider-wrap').append(elements[0]);
        }, 500);
    }
};


// previous slide
function previousSlide() {
    const elements = document.querySelectorAll('.slide-card');
    // animate the slider wrapper
    document.querySelector('.slider-wrap').classList.add('slider-move-left');
    for (let index = 0; index <= count; index++) {
        // set animations
        setTimeout(() => {
            elements[index].classList.add('move-right');
        }, 0);
        setTimeout(() => {
            elements[index].classList.remove('active');
            elements[0].classList.add('active');
            elements[index].classList.remove('move-right');
            document.querySelector('.slider-wrap').prepend(elements[elements.length - 1]);
        }, 500);
    }
}

 // Function to handle button clicks
 function showContent(action) {
    console.log(action)
    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(function (section) {
        section.style.display = 'none';
    });

    // Show the selected content section
    document.getElementById(action).style.display = 'block';
}