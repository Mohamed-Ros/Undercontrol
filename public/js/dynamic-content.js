document.addEventListener("DOMContentLoaded", function () {
  const baseUrl = window.location.origin;

  fetch(`${baseUrl}/api/achievements`)
    .then((response) => response.json())
    .then((data) => {
      const grid = document.getElementById("achievementsGrid");
      grid.innerHTML = "";
      data.achievements.forEach((achievement) => {
        const card = document.createElement("div");
        card.classList.add("card");
        const img = document.createElement("img");
        img.src = `${baseUrl}/storage/${achievement.image_path}`;
        img.alt = achievement.title;
        const overlay = document.createElement("div");
        overlay.classList.add("overlay");
        overlay.textContent = achievement.title;
        card.appendChild(img);
        card.appendChild(overlay);
        grid.appendChild(card);
      });
    })
    .catch((error) => console.error("Error loading achievements:", error));

  fetch(`${baseUrl}/api/courses`)
    .then((response) => response.json())
    .then((data) => {
      const row = document.getElementById("coursesRow");
      row.querySelectorAll(".col-lg-4").forEach((col) => col.remove());
      data.courses.forEach((course) => {
        const col = document.createElement("div");
        col.classList.add("col-lg-4", "col-md-6", "mb-4");
        const card = document.createElement("div");
        card.classList.add("card-course");
        card.style.cursor = "pointer";
        card.addEventListener("click", () => {
          window.location.href = `/course/${course.id}`;
        });
        const img = document.createElement("img");
        img.src = `${baseUrl}/storage/${course.image}`;
        img.alt = course.name;
        const dataDiv = document.createElement("div");
        dataDiv.classList.add("data-course");
        const title = document.createElement("h3");
        title.textContent = course.name;
        const desc = document.createElement("p");
        desc.textContent = course.description;
        const btnDiv = document.createElement("div");
        btnDiv.classList.add("btn-course");
        const link = document.createElement("a");
          link.href = `/course/${course.id}`;
        link.textContent = "تفاصيل الكورس";
        btnDiv.appendChild(link);
        dataDiv.appendChild(title);
        dataDiv.appendChild(desc);
        dataDiv.appendChild(btnDiv);
        card.appendChild(img);
        card.appendChild(dataDiv);
        col.appendChild(card);
        row.appendChild(col);
      });
    })
    .catch((error) => console.error("Error loading courses:", error));

  fetch(`${baseUrl}/api/projects`)
    .then((response) => response.json())
    .then((data) => {
      const wrapper = document.getElementById("projectsWrapper");
      wrapper.innerHTML = "";
      data.projects.forEach((project) => {
        const slide = document.createElement("div");
        slide.classList.add("swiper-slide", "card-project");
        const video = document.createElement("video");
        video.src = `${baseUrl}/storage/${project.video}`;
        video.autoplay = true;
        video.classList.add("w-100");
        video.controls = true;
        const title = document.createElement("h5");
        title.classList.add("title-project");
        title.textContent = project.name;
        const desc = document.createElement("p");
        desc.textContent = project.description;
        slide.appendChild(video);
        slide.appendChild(title);
        slide.appendChild(desc);
        wrapper.appendChild(slide);
      });
      const count = data.projects.length;
      const slidesToShow = count >= 3 ? 3 : count === 2 ? 2 : 1;
      new Swiper(".mySwiper", {
        slidesPerView: slidesToShow,
        spaceBetween: count > 1 ? 30 : 0,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          320: { slidesPerView: 1 },
          768: { slidesPerView: Math.min(slidesToShow, 2) },
          1024: { slidesPerView: slidesToShow },
        },
      });
    })
    .catch((error) => console.error("Error loading projects:", error));

  fetch(`${baseUrl}/api/tools`)
    .then((response) => response.json())
    .then((data) => {
      const row = document.getElementById("toolsRow");
      row.querySelectorAll(".img-language").forEach((col) => col.remove());
      const count = data.tools.length;
      let colClass = "col-lg-2";
      if (count === 1) colClass = "col-lg-4";
      else if (count === 2) colClass = "col-md-3";
      else if (count === 3) colClass = "col-md-3";
      else if (count === 4) colClass = "col-md-3";
      else if (count === 5) colClass = "col-md-2";
      data.tools.forEach((tool) => {
        const col = document.createElement("div");
        col.classList.add("img-language", "col-6", "col-md-4", colClass, "d-flex", "justify-content-center", "align-items-center", "mb-3");
        const card = document.createElement("div");
        card.classList.add("card-tool");
        const img = document.createElement("img");
        img.src = `${baseUrl}/storage/${tool.image}`;
        img.alt = tool.name;
        card.appendChild(img);
        col.appendChild(card);
        row.appendChild(col);
      });
    })
    .catch((error) => console.error("Error loading tools:", error));

  fetch(`${baseUrl}/api/features`)
    .then((response) => response.json())
    .then((data) => {
      const row = document.getElementById("featuresRow");
      row.querySelectorAll(".col-md-4").forEach((col) => col.remove());
      data.features.forEach((feature) => {
        const col = document.createElement("div");
        col.classList.add("col-md-4");
        const answerDiv = document.createElement("div");
        answerDiv.classList.add("answer");
        const p = document.createElement("p");
        p.textContent = feature.title;
        answerDiv.appendChild(p);
        col.appendChild(answerDiv);
        row.appendChild(col);
      });
    })
    .catch((error) => console.error("Error loading features:", error));

  fetch(`${baseUrl}/api/faqs`)
    .then((response) => response.json())
    .then((data) => {
      const faqContainer = document.getElementById("faqContainer");
      faqContainer.innerHTML = "";
      data.faqs.forEach((faq, index) => {
        const accordion = document.createElement("div");
        accordion.classList.add("accordion");
        const button = document.createElement("button");
        button.classList.add("accordion-button");
        const questionSpan = document.createElement("span");
        questionSpan.classList.add("question");
        questionSpan.textContent = faq.question;
        const iconDiv = document.createElement("div");
        iconDiv.classList.add("icon");
        iconDiv.innerHTML = `<span class="material-symbols-outlined">expand_more</span>`;
        button.appendChild(questionSpan);
        button.appendChild(iconDiv);
        const contentDiv = document.createElement("div");
        contentDiv.classList.add("accordion-content");
        const ul = document.createElement("ul");
        ul.classList.add("list-accord");
        const li = document.createElement("li");
        li.textContent = faq.answer;
        ul.appendChild(li);
        contentDiv.appendChild(ul);
        accordion.appendChild(button);
        accordion.appendChild(contentDiv);
        faqContainer.appendChild(accordion);
        button.addEventListener("click", function () {
          const active = button.classList.contains("active");
          document.querySelectorAll(".accordion-button").forEach((btn) => {
            btn.classList.remove("active");
            btn.nextElementSibling.style.maxHeight = null;
          });
          if (!active) {
            button.classList.add("active");
            contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
          }
        });
      });
    })
    .catch((error) => console.error("Error loading FAQs:", error));
});
