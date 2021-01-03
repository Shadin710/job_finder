const skill = document.querySelector('.skill');
const form = document.querySelector('#form');
const container = document.querySelector('.container');
i=0;
let string = `<div class="skill_1"><label for="skill"></label><input type="text" id="skill" placeholder="Desired Skill" name="skill${i}">`;

form.addEventListener('click', e => {
    let string = `<div class="skill_1"><label for="skill"></label><input type="text" id="skill" placeholder="Desired Skill" name="skill${i}">`;

    if (e.target.classList.contains('small')) {
        skill.insertAdjacentHTML("afterend", string);
    }
    i++;
})