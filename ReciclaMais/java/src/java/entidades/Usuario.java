package entidades;

public class Usuario {
    
    private int id;
    private String login;
    private String senha;
    private String acesso;
    private String status;

    public Usuario() {
    }
    
    public Usuario(int id, String login, String senha, String acesso, String status) {
        this.id = id;
        this.login = login;
        this.senha = senha;
        this.acesso = acesso;
        this.status = status;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public String getAcesso() {
        return acesso;
    }

    public void setAcesso(String acesso) {
        this.acesso = acesso;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
    
    
}
