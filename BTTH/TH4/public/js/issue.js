//-delete these
let btnDelete = document.querySelectorAll(".btn-delete");
if (btnDelete.length > 0) {
  const frmDelete = document.querySelector(".frm-delete");
  btnDelete.forEach(btn => {
    btn.addEventListener("click", () => {
      //in ra thong bao xac nhan xoa ko
      const isConfirm = confirm("Bạn có chắc muốn xóa vấn đề này?")

      if (isConfirm) {
        //neu dong y moi gui id these muon xoa
        const id = btn.getAttribute("data-id");
        // // console.log(action)
        frmDelete.action = `/issue/delete/${id}`;
        frmDelete.submit()
      }
    })
  })
}