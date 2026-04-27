const coursesDiv = document.getElementById("courses");
const enrolledList = document.getElementById("enrolled");

fetch("http://localhost:8000/backend/index.php?action=courses")
    .then(res => res.json())
    .then(data => {

        data.forEach(course => {

            const div = document.createElement("div");
            div.className = "border rounded p-3 mb-3";

            div.innerHTML = `
                <h5>${course.title}</h5>
                <pre style="font-size:12px">${course.structure}</pre>
                <button class="btn btn-sm btn-primary"
                    onclick="enroll('${course.title}')">
                    Enroll
                </button>
            `;

            coursesDiv.appendChild(div);
        });
    });

function enroll(course) {
    fetch("http://localhost:8000/backend/index.php?action=enroll", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `course=${course}`
    })
    .then(res => res.json())
    .then(() => {
        const li = document.createElement("li");
        li.className = "list-group-item";
        li.textContent = course;
        enrolledList.appendChild(li);
    });
}

function createCourse() {
    const title = document.getElementById("courseTitle").value;

    fetch("http://localhost:8000/backend/index.php?action=createCourse", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `title=${title}`
    })
    .then(res => res.json())
    .then(() => {
        location.reload(); // simplest safe refresh
    });
}