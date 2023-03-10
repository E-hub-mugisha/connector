// https://api.whatsapp.com/send?text=[post-title] [post-url]

// https://www.facebook.com/sharer.php?u=[post-url]

// https://twitter.com/share?url=[post-url]&text=[post-title]&via=[via]&hashtags=[hashtags]

// https://www.linkedin.com/shareArticle?url=[post-url]&title=[post-title]

const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");
const whatsappBtn = document.querySelector(".whatsapp-btn");


function init(){
    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI("Hi everyone, please check this out:");

    facebookBtn.setAttribute(
        "href",
        `https://www.facebook.com/sharer.php?u=${postUrl}`
    );
    twitterBtn.setAttribute(
        "href",
        `https://twitter.com/share?url= ${postUrl}&text=${postTitle}`
    );
    linkedinBtn.setAttribute(
        "href",
        `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
    );
    whatsappBtn.setAttribute(
        "href",
        `https://api.whatsapp.com/send?text=${postUrl} ${postTitle}`
    );
}
init()