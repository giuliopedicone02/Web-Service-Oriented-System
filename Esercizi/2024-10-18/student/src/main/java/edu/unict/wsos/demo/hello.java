package edu.unict.wsos.demo;

import java.io.IOException;
import java.io.PrintWriter;

import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class hello extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response) {
        response.setContentType("text/html");

        String HelloParam = request.getParameter("world");

        PrintWriter out = null;
        try {
            out = response.getWriter();
        } catch (IOException e) {
            e.printStackTrace();
        }

        out.write("<html><head></head><body>");
        out.write("<h1>Hello World Servlet</h1>");
        out.write("HTTP GET PARAMS:" + HelloParam);
        out.write("</body></html>");
    }
}