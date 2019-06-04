@extends('layouts.layoutindex')
@section('content2')


<div class="site-section">
  <div class="container">
    <div class="column">
      <strong><h2 align="center">Individual Declaration and Indemnity for first-time Physical Activity Participant</h2></strong>  
    </div>
    <div style="padding: 20px 20px; text-align:justify;" class="column">
        <p>
        I declare that all information provided in this Declaration Form are true and correct. I
acknowledge and understand that the Health Promotion Board (HPB) is under no obligation to
countercheck any information I may provide in this Declaration Form, against any information I
may have provided in the past whether by way of participation in previous/other activities or
programmes or otherwise, and I accept that I remain fully responsible for the accuracy of the
information I am now submitting.
        </p>
    <br/>
        <p>
        
        I confirm that I understand all questions on the Physical Activity Readiness Questionnaire <b>(“PAR-
Q”)</b> and have answered them truthfully. I understand that HPB, the event organiser, fitness
trainers or instructors do not review my medical status and history, or assess my individual
health risk. I accept that it remains my personal responsibility to ensure that I am medically fit
and ready to take part in any activity I have registered for. Pending my replies to the PAR-Q, I
understand that I may be required to seek advice and clearance from a doctor prior to
participation in any activity. It is my sole responsibility to do so.
        </p>
<br/>
<p>
I understand that my participation in the activity/programme is voluntary. I may choose to
withdraw at any time and will inform the event organiser of my decision.<br/>
I confirm that I have read and understood all the Terms and Conditions relating to the
participation of the HPB activity/programme.
</p>
<br/>
<b><u><h4 style="">Note to participants:</h4></u></b>
<br/>
<p>
# I understand and allow Health Promotion Board (HPB), together with its fitness partner(s)
conducting the activity the sole ownership and copyright to use or reproduce my photograph taken
at the event for the purposes of collaterals or websites, without payment of any fees.<br/><br/>
# I understand that HPB, the event organiser, fitness trainers or instructors do not review my
medical status and history, or assess my individual health risk. Whilst reasonable precautions will be
taken by HPB and the fitness partner(s) to ensure the safety of participants, participants take part at
their own risks and it remains my personal responsibility to ensure I are medically fit and ready to
take part in any activity I have registered for. HPB, the fitness partner, and their appointed officials
shall not be liable for any death or injury, loss or damage, suffered or otherwise, and howsoever
arising.<br/><br/>
# I understand that my participation in the activity/programme is voluntary. I may choose to
withdraw at any time and will inform the event organiser of my decision. The fitness partner
reserves the right to remove any participant deemed physically incapable of continuing with the
activity to prevent him/her from causing greater harm and injury to himself/herself.
</p><br/><br/>
<form method="post" action="{{url('terms')}}">
{{ csrf_field() }}
<input type="hidden" name="fullname" value="{{ $name }}">
<input type="hidden" name="email" value="{{ $email }}">
<input type="hidden" name="company" value="{{ $company }}">
<input type="hidden" name="phone" value="{{ $phone }}">
<input type="hidden" name="permit" value="{{ $workpermit }}">
<input type="hidden" name="password" value="{{ $password }}">

<table style="width:60%;  border: 1px solid black; margin: 0 auto;">
  <tr style=" border: 1px solid black;">
    <th  style=" border: 1px solid black; width: 20%;  padding: 5px; ">Name:</th>
    <td>
    <input style="padding: 0 5px;" type="text" name="nam" required>
    <span class="focus-input100" style="color: red">{{ $errors->first('nam') }}</span>
    </td>
  </tr>
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black;  padding: 5px; ">IC:</th>
    <td><input style="padding: 0 5px;" type="text" name="ic" required>
    <span class="focus-input100" style="color: red">{{ $errors->first('ic') }}</span></td>
  </tr>
  <tr style=" border: 1px solid black;">
    <th  style=" border: 1px solid black;  padding: 5px; ">Signature:</th>
    <td><input style="padding: 0 5px;" type="text" name="signature" required>
    <span class="focus-input100" style="color: red">{{ $errors->first('signature') }}</span></td>
  </tr>
  <tr style=" border: 1px solid black;">
    <th  style=" border: 1px solid black;  padding: 5px; ">Date:</th>
    <td><input style="padding: 0 5px;" type="date" name="dat" required>
    <span class="focus-input100" style="color: red">{{ $errors->first('dat') }}</span></td>
  </tr>

</table>
<br/><br/>
<h3>Health Promotion Board Physical Activity Readiness Questionnaire PAR-Q
保健促进局体力活动适应力问卷调查 PAR-Q</h3>
<br/><br/>
<p>
Regular exercise is associated with many health benefits. Increasing physical activity is safe
for most people. However, some individuals should check with their doctor before they
become more physically active. Completion of this questionnaire is a first step when
planning to increase the amount of physical activity in your life.<br/><br/>
Common sense is your best guide when you answer these questions. Please read the
questions carefully and answer each one honestly.<br/><br/>
If you have honestly answered <b>‘NO’</b> to all the questions, you can be reasonably sure that
you are at low risk to participate in this HPB exercise programme or event.<br/><br/>
If you have answered <b>‘YES’</b> to any of the questions below, you are required to be evaluated
by your doctor whether you can participate in this HPB exercise programme or event. 
Please ask your doctor to complete the HPB Medical Advisory Form.<br/><br/>
经常运动有益身心。对多数人来说，多做运动是安全的。不过，仍有些人在开始常做运动之前
应先征询医生的意见。完成本问卷是您计划增加生活中的体力活动量的第一步。<br/><br/>
普通常识是您回答这些问题时的最佳指引。请仔细阅读以下问题，并诚实回答 “是” 或 “否”。<br/><br/>
如果您所有问题都回答 “否”，便可合理地确定您参与此保健促进局运动计划或活动不会出现太
大的风险。<br/><br/>
如果您在以下问题中有任何一题回答 “是”，您就必须接受医生的评估以确定您能否参与此保健
促进局运动计划或活动。请要求您的医生填写保健促进局 医学咨询表格
</p>
<br/><br/>
<table style="width:90%;  border: 1px solid black; margin: 0 auto;">
  <tr style="border: 1px solid black;">
    <th colspan="3" style=" border: 1px solid black; width: 20%;  padding: 5px; ">Please read each question carefully and answer to your best knowledge by circling on the form:<br/>
请仔细阅读每一个问题，并在表格上依您所知圈出适合的答案：</th>

  </tr>
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">1. Has anyone in your immediate family (mother, father, sister or brother) had a heart attack or
died suddenly of a heart related disorder before age 55 (men) or 65 (women)?<br/><br/>
您的直系亲属中（爸爸、妈妈、姐姐、妹妹、哥哥或弟弟）是否有人在 55 岁（男性）或65（
女性）之前，曾心脏病发作或死于与心脏失调病有关？<span class="focus-input100" style="color: red">{{ $errors->first('q1') }}</span></th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q1" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q1" value="0" required><br/>否</td>
    
  </tr>
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">2. Has your doctor informed you that you have any of these conditions? (check all that apply)<br/>

Heart condition or disease (also includes any type of heart surgery)<br/>

Stroke<br/><br/>

您的医生是否已告知您患有以下任何一种疾病？（请勾选所有适合的答案）<br/>

心脏病或疾病（也包括任何类型的心脏手术）<br/>

中风
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q2"  value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q2"  value="0" required><br/>否</td>
    
  </tr>

  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">3. 
    Has your doctor informed you that you have any of these conditions? (check all that apply)<br/>
 Lung disease (e.g. chronic obstructive pulmonary disease/COPD or asthma)<br/>
 Diabetes<br/><br/>
您的医生是否已告知您患有以下任何一种疾病？（请勾选所有适合的答案）<br/>
 肺病（例如慢性阻塞性肺病/COPD 或哮喘病）<br/>
 糖尿病
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q3" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q3" value="0" required><br/>否</td>
    
  </tr>

  
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">4. 
    In the past 1 year, have you had chest pain when you engage in physical activity or when at
rest?<br/><br/>
在过去1年里，您是否曾在进行体力活动时或没有进行任何活动时感到胸口疼痛？
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q4" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q4" value="0" required><br/>否</td>
    
  </tr>

    
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">5. 
    Do you ever experience dizziness or even lose consciousness?<br/>
您是否曾感到晕眩或甚至失去知觉？
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q5" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q5" value="0" required><br/>否</td>
    
  </tr>

     
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">6. 
    Do you have any bone, joint or muscle problem (e.g. back, knee, hip, shoulder or ankle) that
could be made worse by participating in exercise?<br/><br/>
您的骨骼、关节或肌肉（例如脊椎、膝盖、髋、肩膀或脚踝）是否有可能因参与运动而恶化？
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q6" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q6" value="0" required><br/>否</td>
    
  </tr>
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">7. 
    Do you take tablets for high blood pressure and either continue to have poorly controlled
high blood pressure, or you do not follow up with a doctor on a regular basis?<br/><br/>
您是否正在服用治疗高血压的药物，同时高血压情况控制不佳，或没有定期和医生跟进？
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q7" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q7" value="0" required><br/>否</td>
    
  </tr>
  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">8. Are you currently pregnant? (Female participants to note: If you are currently pregnant,
please speak with your doctor about an appropriate exercise programme. This HPB exercise
programme is not designed for pregnancy.)<br/><br/>
您目前是否怀孕？（女性参加者请注意: 如果您目前已怀孕，请与您的医生商讨一个适合您的
运动计划，此运动计划的设计不适合怀孕者。）
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q8" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q8" value="0" required><br/>否</td>
    
  </tr>

  <tr style=" border: 1px solid black;">
    <th style=" border: 1px solid black; width: 90%;  padding: 5px; ">9. Do you know of any reason why participating in this HPB exercise programme or any other
physical activity might be harmful to your health?<br/><br/>
是否有任何原因会令参与此 保健促进局运动计划或任何其它体力活动可能对您的健康造成危害？
</th>
    <td  style=" border: 1px solid black;  padding: 5px;">Yes <br/><input type="radio" name="q9" value="1" required><br/>是</td>
    <td  style=" border: 1px solid black;  padding: 5px;">No <br/><input type="radio" name="q9" value="0" required><br/>否</td>
    
  </tr>
</table>
<div class="row" style="margin-top: 25px;">
<div class="col-lg-4"></div>
<div class="col-lg-4">
<div class="container-login100-form-btn">
            <input style="text-align: center;" class="login100-form-btn" type="submit" value="Sign up">

					</div>

</div>
<div class="col-lg-4"></div>

</div>

</form>
    </div>



</div>



          </div>
      </div>
    </div>
  </div>
</div>


    @endsection
