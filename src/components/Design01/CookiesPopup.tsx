import React, {useState} from 'react';

export default function CookiesPopup() {
    const [open, setOpen] = useState(true);

    return <div className={`popup-cookies${open ? " open" : ""}`}>
        <span>We use cookies to give you the best experience on our site. You can find out more about which cookies we are using or switch them off in </span>
        <button onClick={() => setOpen(!open)}>OK</button>
    </div>
}