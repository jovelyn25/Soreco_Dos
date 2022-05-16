function printElement(elem, append, delimiter) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    if (append !== true) {
        $printSection.innerHTML = "";
    } else if (append === true) {
        if (typeof delimiter === "string") {
            $printSection.innerHTML += delimiter;
        } else if (typeof delimiter === "object") {
            $printSection.appendChlid(delimiter);
        }
    }

    $printSection.appendChild(domClone);
}

//{{-----------------------------VIEW SCRIPT--------------------------------}}
$("#viewnewnotice").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var notice_date = button.data("notice_date");
    var notice_time = button.data("notice_time");
    var notice_areas = button.data("notice_areas");
    var notice_reasons = button.data("notice_reasons");

    var modal = $(this);
    modal.find(".modal-title").text("Notice of Power Service Interruption");
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #notice_date").val(notice_date);
    modal.find(".modal-body #notice_time").val(notice_time);
    modal.find(".modal-body #notice_areas").val(notice_areas);
    modal.find(".modal-body #notice_reasons").val(notice_reasons);
});
//{{-----------------------------GENERATE SCRIPT--------------------------------}}
$("#notice").on("show.bs.notice")(function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var notice_date = button.data("notice_date");
    var notice_time = button.data("notice_time");
    var notice_areas = button.data("notice_areas");
    var notice_reasons = button.data("notice_reasons");

    var notice = $(this);
    notice.find(".notice-title").text("Generate Notice");
    notice.find(".notice-body #id").val(id);
    notice.find(".notice-body #notice_date").val(notice_date);
    notice.find(".notice-body #notice_time").val(notice_time);
    notice.find(".notice-body #notice_areas").val(notice_areas);
    notice.find(".notice-body #notice_reasons").val(notice_reasons);
});

//{{-----------------------------DELETE SCRIPT--------------------------------}}
$("#deletenewnotice").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");

    var modal = $(this);
    modal.find(".modal-title").text("Delete Notice");
    modal.find(".modal-body #id").val(id);
});

//{{-----------------------------EDIT SCRIPT--------------------------------}}

$("#editnewnotice").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var id = button.data("id");
    var notice_date = button.data("notice_date");
    var notice_time = button.data("notice_time");
    var notice_areas = button.data("notice_areas");
    var notice_reasons = button.data("notice_reasons");

    var modal = $(this);
    modal.find(".modal-title").text("Psi Schedule");
    modal.find(".modal-body #id").val(id);
    modal.find(".modal-body #notice_date").val(notice_date);
    modal.find(".modal-body #notice_time").val(notice_time);
    modal.find(".modal-body #notice_areas").val(notice_areas);
    modal.find(".modal-body #notice_reasons").val(notice_reasons);
});
