import { useState, useEffect } from 'react';

function Content(){

    const [image, setImage] = useState()

    const changeImage = (file) =>{
        if (file){
            file.previewImage = URL.createObjectURL(file)
            setImage(file);
        }
        else setImage();
    }

    useEffect(() => {

        return ()=> {
            if (image){
                URL.revokeObjectURL(image.previewImage)

            }
        }
    },[image])
    
    return (<div>
        <h2>check</h2>
        <input 
            type="file"
            onChange = {e => changeImage(e.target.files[0])} 
        />
        {image && 
            <img src={image.previewImage} alt="" width='300'/>
        }
    </div>
    );
}

export default Content;