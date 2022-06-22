package dao;

import java.util.List;
import entidades.Empresa;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class EmpresaDao {
    
    public static List<Empresa> getEmpresas(){
        List<Empresa> list = new ArrayList<Empresa>();
        try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT id, nome, ramo, cnpj FROM empresa");
        ResultSet rs = ps.executeQuery();
        while(rs.next()){
            Empresa empresa = new Empresa();
            empresa.setId(rs.getInt("id"));
            empresa.setNome(rs.getString("nome"));
            empresa.setRamo(rs.getString("ramo"));
            empresa.setCnpj(rs.getString("cnpj"));
            list.add(empresa);
        }       
    }catch(Exception erro){
        System.out.println(erro);
    }
        return list;
    }
   
}
