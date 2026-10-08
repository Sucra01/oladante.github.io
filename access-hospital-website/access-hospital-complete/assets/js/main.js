const menuBtn=document.querySelector('.menu-btn');
const nav=document.querySelector('.nav-links');
if(menuBtn){menuBtn.addEventListener('click',()=>nav.classList.toggle('open'));}

document.querySelectorAll('.nav-links a').forEach(a=>a.addEventListener('click',()=>nav?.classList.remove('open')));

const observer=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('show')})},{threshold:.12});
document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));

document.querySelectorAll('[data-year]').forEach(el=>el.textContent=new Date().getFullYear());

async function submitBackendForm(form, endpoint, messageId){
  form.addEventListener('submit', async (e)=>{
    e.preventDefault();
    const msg=document.querySelector(messageId);
    const button=form.querySelector('button[type=submit]');
    if(button) button.disabled=true;
    try{
      const response=await fetch(endpoint,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(Object.fromEntries(new FormData(form)))});
      const data=await response.json();
      if(msg){msg.textContent=data.message||'Request submitted.';msg.hidden=false;msg.classList.toggle('success',!!data.success);}
      if(data.success) form.reset();
    }catch(err){ if(msg){msg.textContent='We could not submit your request right now. Please contact the hospital directly.';msg.hidden=false;} }
    finally{if(button) button.disabled=false;}
  });
}
const appointmentForm=document.querySelector('#appointmentForm');
if(appointmentForm) submitBackendForm(appointmentForm,'api/appointments.php','#formMessage');
const contactForm=document.querySelector('#contactForm');
if(contactForm) submitBackendForm(contactForm,'api/contact.php','#contactMessage');
