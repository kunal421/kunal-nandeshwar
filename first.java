import java.awt.*;  
import java.awt.event.*;  
public class first
{  
public static void main(String[] args) {  
    Frame f=new Frame("product example");
     Label l1=new Label(" no");	
	 l1.setBounds(20,50, 150,20);
	 Label l2=new Label(" name");	
	 l2.setBounds(20,70, 50,20);
	 Label l3=new Label(" price");	
	 l3.setBounds(20,90, 150,20);
	TextField t1=new TextField(); 
	t1.setBounds(70,50, 150,20);  
	TextField t2=new TextField();  
    t2.setBounds(70,70, 150,20);  
	TextField t3=new TextField();  
    t3.setBounds(70,90, 150,20);  
    Button b=new Button("Find");  
    b.setBounds(100,120,60,30); 
 TextField tf=new TextField(); 
	tf.setBounds(100,200, 150,20);	
    b.addActionListener(new ActionListener(){  
    public void actionPerformed(ActionEvent e){  
            tf.setText("pro details");  
        }  
    });  
	f.add(t1);f.add(t3); f.add(l1);  f.add(l2);  f.add(l3);   
    f.add(b);f.add(t2);  f.add(tf);
    f.setSize(400,400);  
    f.setLayout(null);  
    f.setVisible(true);   
}  
}  