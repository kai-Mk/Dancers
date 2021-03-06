import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "",
    },
    
     // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    select: function (info) {
        alert("selected " + info.startStr + " to " + info.endStr);
    },
});
calendar.render();