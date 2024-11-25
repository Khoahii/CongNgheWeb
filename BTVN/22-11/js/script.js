const icons = document.querySelectorAll(".icon");
if(icons){
  icons.forEach((icon) => {
    icon.addEventListener("click", (e) => {
      //- tìm ra dòng đưcọ ấn nút
      const currentRow = e.target.closest("tr");

      //- lay ra noi dung trn dong
      const contents = currentRow.querySelectorAll("td");
      const user = {};

      contents.forEach((td, index) => {
        if (index === 0) user.id = td.textContent.trim();
        if (index === 2) user.name = td.textContent.trim();
        if (index === 3) user.address = td.textContent.trim();
        if (index === 4) user.sex = td.textContent.trim();
      });


      const type = icon.getAttribute("type")
      switch (type) {
        case "update":
          // Gửi dữ liệu đến server để lưu vào session
          fetch("../../BTVN/22-11/components/InputForm/update.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(user), // Gửi user object lên server
          })
          .then((response) => response.json()) // Chờ phản hồi từ server
          .then((data) => {
            if (data.status === 200) {
              window.location.href = "../../BTVN/22-11/components/InputForm/update.php";
            } else {
              console.error("Error:", data.message);
            }
          })
          .catch((error) => {
            console.error("Fetch error:", error);
          });
          break;

        case "delete":
          fetch("../../BTVN/22-11/actions/deleteOne.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ id: user.id }),
          })
            .then((response) => response.json())
            .then((data) => {
              // console.log(data.status); // In ra id từ PHP
              if (data.status == 200){
                window.location.reload();
              }
            })
          break;
      
        default:
          break;
      }
    })
  })
}
