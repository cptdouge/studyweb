
//hien thi du lieu len man hinh
function display(val)
{
	if(document.getElementById("result").value=="0")
	{
		document.getElementById("result").value = ""
	}
	document.getElementById("result").value+=val
}

//dung ham eval tinh toan va tra ve kq vao bien result
function solve()
{
	 let x = document.getElementById("result").value
	 let y = eval(x)
	document.getElementById("result").value = y
}

//clear man  hinh ketqua

function clr()
{
	a="0"
	document.getElementById("result").value=a
}

//xoa 1 ki tu
function del()
{	

	str = document.getElementById("result").value
	if(str!=0){
	document.getElementById("result").value = str.substr(0,str.length - 1)
	}
}