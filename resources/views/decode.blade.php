<!DOCTYPE html>
<html>
<head>
    <meta  charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <title>解析Excel文件</title>
    
    <style>
    html{font-size:62.5%;}
    body {font:normal 80% Arial,sans-serif;font-size:14px; font-size:1.4rem;text-align:center } 
.file {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 9px solid #99D3F5;
    border-radius: 12px;
    padding: 36px 108px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 180px;
}
.file input {
    position: absolute;
    font-size: 400px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}
    
    </style>
</head>
<body>
    


    <a href="javascript:;" class="file">
        <input type="file" name="file" id="file" onchange="importf(this)" /> 
            <h2 id="empty">点击选择</h2>
            
    </a>
    <h2 id="status">文件名：</h2>

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/xlsx/0.12.6/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.3.2.js"></script>
<script type="text/javascript">

    var wb; // 读取完成的数据
    var rABS = false; // 是否将文件读取为二进制字符串
    // 导入
    function fixdata(data) {
        console.log("fixdata")
        var o = "",
            l = 0,
            w = 10240;
        for (; l < data.byteLength / w; ++l) {
            o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w, l * w + w)));
        }
        o += String.fromCharCode.apply(null, new Uint8Array(data.slice(l * w)));
        return o;
    }
    
    function importf(obj) {
        if (!obj.files) {
            return;
        }
        var url=document.getElementById("file").value;
        url=url.split("\\");
        $("#status").text('文件名：'+url[url.length-1]);
        
        
        var f = obj.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target.result;
            if (rABS) {
                // 手动转化
                wb = XLSX.read(btoa(fixdata(data)), {
                    type: 'base64'
                });
            } else {
                wb = XLSX.read(data, {
                    type: 'binary'
                });
            }
        var excelKey = new Array();
        var exceldata = XLSX.utils.sheet_to_json(wb.Sheets[wb.SheetNames[0]]);
        var tempi = 0;
        for (var i in exceldata[0]) {
            excelKey[tempi++] = i;
        }
        
         poster(JSON.stringify(excelKey),JSON.stringify(XLSX.utils.sheet_to_json(wb.Sheets[wb.SheetNames[0]])));
        };
        
        var r=window.confirm("文件解析完成，点击左上角返回~");
        
        if (rABS) {
            reader.readAsArrayBuffer(f);
        } else {
            reader.readAsBinaryString(f);
        }
    }

    function poster(excelKey,exceldata){

        wx.miniProgram.postMessage({ 
            data: {
                key: excelKey , 
                data: exceldata
            } 
        })
    }

</script>
</body>
</html>