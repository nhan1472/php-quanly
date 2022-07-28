
    function ttien()
    {
    s=0
    for(j=1;j<=45;j++)
    {
        s+=Number(document.getElementById(`diem${j}`).value)
    }
    document.getElementById('tongdiem').value =  s 
    if( s<=0)
    {
        alert("bạn chưa đánh giá")
        for(j=1;j<=45;j++)
        {
           document.getElementById(`diem${j}`).value=0
        }
        s=0
    }
    else if(s<50)
    {
        document.getElementById('xeploai').value = "Yếu"
    }
    else if(s>=50&&s<60)
    {
        document.getElementById('xeploai').value = "Trung Bình"
    }
    else if (s >= 60 && s < 70) {
        document.getElementById('xeploai').value ="Trung Bình khá"
    }
    else if (s >= 70 && s < 90) {
        document.getElementById('xeploai').value = "Khá"
    }
    else if(s<100){
        document.getElementById('xeploai').value = "Tôt"
    }
    else{
        alert("điểm của bạn đã quá 100đ mời bạn đánh giá lại")
        for(j=1;j<=45;j++)
        {
           document.getElementById(`diem${j}`).value=0
        }
        s=0
    }
    }
