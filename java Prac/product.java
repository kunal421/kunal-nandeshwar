import java.util.*;
import java.awt.*;
import java.sql.*;
import java.awt.event.*;

class product extends Frame implements ActionListener
{
Label  l1,l2,l3;
TextField t1,t2,t3;
Button b;
Connection con;
product()
{
	setLayout(new FlowLayout());
	l1=new Label("pno");
	l2=new Label("pname");
	l3=new Label("price");
	t1=new TextField(20);
	t2=new TextField(20);
	t3=new TextField(20);
	b=new Button("Search");
	b.addActionListener(this);
try
{
		Class.forName("con.mysql.cj.jdbc.Driver");
		con=DriverManager.getConnection("jdbc:mysql//localhost:3307/product","root","@madhav123");
}
catch(Exception e)
{
System.out.println(e);
}
add(l1);
add(t1);
add(l2);
add(t2);
add(l3);
add(t3);
add(b);
setVisible(true);
setSize(400,400);
}
public static void main(String[] args)
{
		new product();
}

public void actionPerformed(ActionEvent e)
{
if(e.getSource()==b)
{
	PreparedStatement ps=con.prepareStatement("Select * from item where pno=?");
	ps.setInt(1,Integer.parseInt(t1.getText()));

	ResultSet rs=ps.executeQuery();
while(rs.next())
{
	t2.setText(rs.getString(2));
	t3.setText(""+rs.getInt(3));
}
}
}
}

