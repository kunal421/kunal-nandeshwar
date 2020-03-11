import javax.servlet.*;
import java.io.*;
import java.sql.*;
public class register extends GenericServlet
{
	public void service(ServletRequest req,ServletResponse res) throws IOException, ServletException
	{
		PrintWriter out=res.getWriter();
		String rid=req.getParameter("rid");
		String regdate=req.getParameter("regdate");
		String sname=req.getParameter("sname");
		String mobno=req.getParameter("mobno");
		String evname=req.getParameter("evname");
		try
		{
			Class.forName("com.mysql.jdbc.Driver");
			Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3307/registration","root","1111");
			PreparedStatement st=con.prepareStatement("insert into registration values(?,?,?,?,?)");
			st.setInt(1,Integer.parseInt(rid));
			st.setDate(2,Date.valueOf(regdate));
			st.setString(3,sname);
			st.setDouble(4,Double.parseDouble(mobno));
			st.setString(5,evname);
			int r=st.executeUpdate();
			if(r>0)
				out.println("Registration successfull");
			else
				out.println("Try Again");
		}
		catch(Exception e)
		{	out.println(e);	}	
	}
}