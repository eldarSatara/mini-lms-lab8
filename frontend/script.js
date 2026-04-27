const coursesDiv = document.getElementById("courses");
const enrolledList = document.getElementById("enrolled");

fetch("http://localhost:8000/backend/index.php?action=courses")
    .then(res => res.json())
    .then(data => {
        data.forEach(course => {
            const div = document.createElement("div");
            div.innerHTML = `
                <h3>${course.title}</h3>
                <button onclick="enroll('${course.title}')">Enroll</button>
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
        li.textContent = course;
        enrolledList.appendChild(li);
    });
}