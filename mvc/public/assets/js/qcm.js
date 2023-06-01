// head of card element
let question_num_element = document.querySelector("span.question_num");

// questions
let card_body = document.querySelector(".card-body");

// footer
let footer_element = document.querySelector(".card-footer");

//button start
let start_button = document.querySelector(".card-footer .start");

//final result
question_num = 0;
score = 0;

fetch("http://localhost/dev/mvc/app/files/qcm.json")
  .then((response) => response.json())
  .then((json) => {
    question_num = json.length;
    question_num_element.textContent = question_num;
    start_button.onclick = () => {
      change_footer(question_num);
      next_question(json);
    };
  });

// add current questions bullets and submit
function change_footer(question_num) {
  //add bulletes
  footer_element.innerHTML = '<div class="current_question d-flex"></div>';
  for (i = 0; i < question_num; i++) {
    footer_element.firstChild.innerHTML +=
      '<li class="bg-primary opacity-50 rounded-circle m-1" style="width:17px; height:17px"></li>';
  }

  //add submit
  footer_element.innerHTML +=
    '<button class="submit btn btn-primary">Submit Answear</button>';
}

// create current question
function next_question(current_json) {
  //get random question
  random_question = Math.floor(Math.random(current_json) * current_json.length);

  //get this question and delete it
  let current_question = current_json.splice(random_question, 1)[0];

  //add question
  card_body.innerHTML = `<h5 class="text-center d-flex justify-content-center align-items-center rounded text-success p-1 border border-success h-25">\
  <span>${escape(current_question["title"])}?</span></h5>`;

  let div = document.createElement('div');
  div.classList.add('d-flex', 'flex-column', 'text-white', 'rounded', 'p-3', 'h-75', 'gap-1');
  
  for (i in current_question) {
    if (i != "title" && i != "right_answer") {
      div.innerHTML += `<div class="d-flex flex-grow-1 align-items-center\">\
      <input id="${i}" name="qcm" class='qcm me-2' type="radio">\
      <label class="p-3 d-flex align-items-center flex-grow-1 h-100 btn btn-outline-primary fs-5" for="${i}"><span>${escape(
        current_question[i]
        )}</span></label>\
        </div>`;
      }
    }
  card_body.appendChild(div);

  let submit = document.querySelector(".submit");

  submit.onclick = () => {
    checked = document.querySelector(".qcm:checked");
    checked &&
    checked.nextElementSibling.textContent == current_question["right_answer"]
      ? score++
      : null;
    if (current_json.length) {
      next_question(current_json);
    } else {
      result();
    }
  };
}

function result() {
  let form = `<form class="d-none" action="" method="POST"><input name="note" value="${score}"><input id="submit" type="submit"></form>`;
  document.body.innerHTML += form;
  document.querySelector("#submit").click();
}
