import "./bootstrap";
import Alpine from "alpinejs";
// import Quill from "quill";

window.Alpine = Alpine;

Alpine.start();

// var options = {
//     debug: "info",
//     modules: {
//         toolbar: [
//             [{ header: [2, false] }],
//             ["bold", "italic", "underline"],
//             [{ list: "ordered" }, { list: "bullet" }],
//         ],
//     },
//     placeholder: "Compose an epic...",
//     theme: "snow",
// };

// var editor = new Quill("#job_description", options);

// document.addEventListener("keydown", (event) => {
//     if (event.code == "Backquote") {
//         console.log(editor.getContents());
//     }
// });
