document.addEventListener("DOMContentLoaded",function () {

	var imageTemplateCV = document.querySelectorAll('.CV_image');
	var button = document.querySelectorAll('.centered');
	var anhdanghienthi = document.querySelector('.displayImg');

	var createCV = document.querySelector('.create_cv');
	// console.log(createCV);

	// console.log(imageTemplateCV);
	// console.log(button);

	for (let i=0; i<imageTemplateCV.length; i++)
	{

		button[i].onclick = function()
		{
			// console.log(imageTemplateCV[i]);
		}
	}

	var colorCV = document.querySelectorAll('.chosenColor');

    for (let i=0; i<colorCV.length; i++)
    {
        createCV.onclick = function()
        {
            console.log(colorCV);
        }
    }



},false)



