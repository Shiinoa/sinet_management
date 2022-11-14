
var xValues = ["OPEN", "SUSSPEND", "HOLD", "PROJECT", "TERMINATE"];
                        //ต้องดึงข้อมูลสถานะการใช้งาน ลง
var yValues = [56, 49, 44, 24, 15];
var barColors = [
"#b91d47",
"#00aba9",
"#2b5797",
"#e8c3b9",
"#1e7145"
];

new Chart("DATA_SINET", {
type: "pie",
data: {
    labels: xValues,
    datasets: [{
    backgroundColor: barColors,
    data: yValues
    }]
    },
    options: {
    title: {
    size: 14,
    display: true,
    text: "SINET FTTX DATA"
                            
     }
     }
    });
                        